<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
auth();
$id=$_SESSION['admin']['id'];
if (isset($_GET['show'])) {
    $id = $_GET['show'];
}
$slelct = "SELECT * FROM `admins` where  `id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$name = $data['name'];
$email = $data['email'];
$age = $data['age'];
$address = $data['address'];
$phone = $data['phone'];
$role_id = $data['role'];
$image = $data['image'];
?>
<section style="background-color: #eee;">
    <div class="text-center">

        <h2> Admin Data </h2>
    </div>
    <div class="container py-6">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/ODC BackEnd/lawer_office/admin/<?= $image ?>" alt="" width="250" height='300'>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $name ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $email ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Age</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $age ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $address ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $phone ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Role_ID</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $role_id ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?php if ($_SESSION['admin']['role'] == 0 || $_SESSION['admin']['id'] == $id) { ?>
    <br>

    <div class="d-flex justify-content-center ">
        <form method="POST" action="list_admins.php">
            <input type="hidden" name="id" value="<?= $data["id"] ?>">
            <button class="btn btn-danger mx-3" onclick="return confirm('are u sure !!')" name="delete">Delete</button>
        </form>
        <a class="btn btn-info" href="update_admin.php?edit=<?= $data['id'] ?>">Update</a>
    </div>
<?php }
include '../shared/footer.php'
?>