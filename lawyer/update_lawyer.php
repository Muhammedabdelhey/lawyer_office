<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
loginauth();
if (isset($_SESSION['admin'])) {
    $id = $_GET['edit'];
} else {
    $id = $_SESSION['lowar']['id'];
}
$slelct = "SELECT * FROM `lowyers` where  `id`=$id";
$query = mysqli_query($connication, $slelct);
$result = mysqli_fetch_assoc($query);
$image_name = $result['image'];
$location = check_image($image_name);
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $years = $_POST['yearesex'];
    $update = "UPDATE `lowyers` SET  `name`='$name',`age`=$age,`address`='$address',`salary`=$salary,
    `yearsEX`=$years,`phone`='$phone',`email`='$email',`image`='$location' WHERE `id`=$id";
    mysqli_query($connication, $update);
    testMessage($update, "update");
    if (isset($_SESSION['admin'])) {
        path('lawyer/list_lawyers.php');
    } else {
        path('lawyer/show_lawyer.php');
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Update Lawyer </h2>
                </div>
                <div class="form-group">
                    <label for="name">Lower Name </label><br>
                    <input type="text" class="form-control" name="name" value="<?= $result['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Lower Email </label><br>
                    <input type="text" name="email" class="form-control" value="<?= $result['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="age">Lower Age </label><br>
                    <input type="text" name="age" class="form-control" value="<?= $result['age'] ?>">
                </div>
                <div class="form-group">
                    <label for="address">Lower Address </label><br>
                    <input type="text" name="address" class="form-control" value="<?= $result['address'] ?>">
                </div>
                <div class="form-group">
                    <label for="salary">Lower Salary </label><br>
                    <input type="text" name="salary" class="form-control" value="<?= $result['salary'] ?>">
                </div>
                <div class="form-group">
                    <label for="yearesex">Lower Experience </label><br>
                    <input type="text" name="yearesex" class="form-control" value="<?= $result['yearsEX'] ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Lower Phone </label><br>
                    <input type="text" name="phone" class="form-control" value="<?= $result['phone'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Lower Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-primary" name="update">Update Lawyer</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>