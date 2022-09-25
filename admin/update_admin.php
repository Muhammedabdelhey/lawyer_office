<?php
include "../genral/DB.php";
include "../genral/functions.php";
include "../shared/header.php";
include "../shared/navbar.php";
$id = $_GET['edit'];
if ($_SESSION['admin']['role'] == 0 || $_SESSION['admin']['id'] == $id) {
    $select = "SELECT * FROM `admins` WHERE `id`=$id";
    $query = mysqli_query($connication, $select);
    $result = mysqli_fetch_assoc($query);
    if (isset($_POST['update'])) {
        $image_name = $result['image'];
        $location = check_image($image_name);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $role = $result['role'];
        if (isset($_POST['roleid'])) {
            $role = $_POST['roleid'];
        }
        $update = "UPDATE `admins` SET `name`='$name',`age`=$age,
        `address`='$address',`phone`='$phone',`email`='$email',
        `image`='$location',`role`=$role WHERE `id`=$id";
        $t = mysqli_query($connication, $update);
        testMessage($t, "update");
        path("admin/list_admins.php");
    }
} else {
    path('admin/list_admins.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Update Admin </h2>
                </div>
                <div class="form-group">
                    <label for="name">Admin Name </label><br>
                    <input type="text" class="form-control" name="name" value="<?= $result['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Admin Email </label><br>
                    <input type="text" name="email" class="form-control" value="<?= $result['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="age">Admin Age </label><br>
                    <input type="text" name="age" class="form-control" value="<?= $result['age'] ?>">
                </div>
                <div class="form-group">
                    <label for="address">Admin Address </label><br>
                    <input type="text" name="address" class="form-control" value="<?= $result['address'] ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Admin Phone </label><br>
                    <input type="text" name="phone" class="form-control" value="<?= $result['phone'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Admin Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <?php if ($_SESSION['admin']['role'] == 0) { ?>
                    <div class="form-group">
                        <label for="roleid">Role </label><br>
                        <select name="roleid" class="form-control">
                            <?php
                            $slelct = "SELECT * FROM `roles`";
                            $query = mysqli_query($connication, $slelct);
                            foreach ($query as $data) {
                            ?>
                                <option value="<?= $data['id'] ?>" <?php if ($result['role'] == $data['id']) echo "selected" ?>>
                                    <?= $data["describtion"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <button class="btn btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>