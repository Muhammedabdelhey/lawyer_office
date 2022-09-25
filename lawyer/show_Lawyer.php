<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
loginauth();
if (isset($_SESSION['admin'])) {
    $id = $_GET['show'];
} else {
    $id = $_SESSION['lowar']['id'];
}
$slelct = "SELECT * FROM `lowyers` where  `id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$name = $data['name'];
$email = $data['email'];
$age = $data['age'];
$address = $data['address'];
$phone = $data['phone'];
$salary = $data['salary'];
$years = $data['yearsEX'];
$image = $data['image'];
?>
<section style="background-color: #eee;">
    <div class="text-center">

        <h2> lawyer Data </h2>
    </div>
    <div class="container py-6">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/ODC BackEnd/lawer_office/lawyer/<?= $image ?>" alt="" width="250" height='300'>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
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
                                <p class="mb-0">Salary</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $salary ?></p>
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
                                <p class="mb-0">Experience</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $years ?></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center ">
                            <form method="POST" action="list_Lawyers.php">
                                <input type="hidden" name="id" value="<?= $data["id"] ?>">
                                <button class="btn btn-danger" onclick="return confirm('are u sure !!')" name="delete">Delete</button>
                            </form>
                            <a class="btn btn-info mx-3" href="update_lawyer.php?edit=<?= $data['id']?>">Update</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?php
include '../shared/footer.php'
?>