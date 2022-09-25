<?php
include "../genral/DB.php";
include "../genral/functions.php";
include "../shared/header.php";
include "../shared/navbar.php";
// insert employee
auth();
if (isset($_POST["insert"])) {
    $name = $_POST["name"];
    $email = $_POST['email'];
    $pass=$_POST['pass'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $salary=$_POST['salary'];
    $years=$_POST['yearesex'];
    $newpassword = sha1($pass);
    // Image code
    //create new name for image 
    $image_name = time()  . $_FILES['image']['name'];
    //get copy of  image from pc to server(upload folder )
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);
    $insert = "INSERT INTO `lowyers` VALUES (null,'$name',$age,'$address',$salary,$years,'$phone','$email','$newpassword','$location')";
    $test = mysqli_query($connication, $insert);
    testMessage($test,"insert");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Add Lawyer </h2>
                </div>
                <div class="form-group">
                    <label for="name">Lower Name </label><br>
                    <input  type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Lower Email </label><br>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Lower Age </label><br>
                    <input type="text" name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Lower Address </label><br>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="salary">Lower Salary </label><br>
                    <input type="text" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label for="yearesex">Lower Experience </label><br>
                    <input type="text" name="yearesex" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Lower Phone </label><br>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass">Lower Password </label><br>
                    <input type="text" name="pass" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Lower Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-primary" name="insert">Insert Lawyer</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>