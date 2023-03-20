<?php
include_once "includess/conniction.php";


$errors=[];
$success=false;
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['m_name'];
    $number=$_POST['m_number'];
    $email=$_POST['m_email'];
    $password=$_POST['m_password'];
    $status=$_POST['status'];
    $address=$_POST['m_address'];
    $description=$_POST['m_description'];

    isset($_POST['status']) ? $status=$_POST['status'] : $status=0;
//        if (isset($_POST['status'])){
//            $status=$_POST['status'];
//        }else{
//            $status=0;
//        }
    $date=Date("y-m-d h:i:s");

    if(empty($name)){
        $errors['name-error']="Name Is Required Please Fill It";
    }
    if(empty($description)){
        $errors['description-error']="Description Is Required Please Fill It";
    }

    if (count($errors) >0){
        $errors['general_error']="Please Fix All Error";
    }else{
        $query="INSERT INTO managers
                (name,mobilenumber,email,passwords,status,address,description)
                VALUES('$name','$number','$email','$password' ,'$status','$address','$description')";
        $result=mysqli_query($link,$query);
        if($result){
            $errors=[];
            $success=true;
        }else{
            $errors['general_error']=mysqli_error($link);
        }
    }


}
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
    include_once "includess/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
      data-col="2-columns">
<!-- fixed-top-->
<?php
include "includess/sidebar.php";
?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Category Info</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <?php
                                    if (!empty($errors['general_error'])){
                                        echo "<div class='alert alert-danger'>".$errors['general_error']."</div>";
                                    }elseif ($success)
                                        echo "<div class='alert alert-success'>Category Added Successfully</div>";



                                    ?>



                                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Add New Manager</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Manager Name</label>
                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Manager Name"
                                                               name="m_name">
                                                        <?php
                                                        if (!empty($errors['name-error'])){
                                                            echo "<span class='text-danger'>".$errors['name-error']."</span>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Manager Number</label>
                                                        <input type="number" id="projectinput2" class="form-control" placeholder="Manager Number"
                                                               name="m_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput3">Manager Email</label>
                                                        <input type="email" id="projectinput3" class="form-control" placeholder="Manager Email"
                                                               name="m_email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Manager Password</label>
                                                        <input type="number" id="projectinput4" class="form-control" placeholder="Manager Password"
                                                               name="m_password">

                                                        <?php
                                                        if (!empty($errors['description-error'])){
                                                            echo "<span class='text-danger'>".$errors['description-error']."</span>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Manager Address</label>
                                                    <input type="text" id="projectinput5" class="form-control" placeholder="Manager Address"
                                                           name="m_address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput6">Manager Description</label>
                                                    <input type="text" id="projectinput6" class="form-control" placeholder="Manager Description"
                                                           name="m_description">

                                                    <?php
                                                    if (!empty($errors['description-error'])){
                                                        echo "<span class='text-danger'>".$errors['description-error']."</span>";
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput7">Status</label>
                                                        <input type="checkbox" id="projectinput7" name="status" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</section>
</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php
include "includess/footer.php";
?>
</body>

</html>