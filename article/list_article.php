<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if (isset($_SESSION['lowar']['email'])) {
    $name = $_SESSION['lowar']['name'];
    $slelct = "SELECT * FROM `articales`  where `auther`='$name' order by update_time desc";
    $query = mysqli_query($connication, $slelct);
} elseif (isset($_SESSION['admin'])) {
    $slelct = "SELECT * FROM `articales` order by update_time desc";
    $query = mysqli_query($connication, $slelct);
}



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    echo $id;
    $selectOne = "SELECT * FROM articales where id =$id";
    $ss = mysqli_query($connication, $selectOne);
    $row = mysqli_fetch_assoc($ss);
    $delete = "DELETE FROM `articales` WHERE id=$id";
    $image = $row['post_image'];
    $d = mysqli_query($connication, $delete);
    testMessage($d, "delete");
    path('article/list_article.php');
    unlink("$image");
    if ($_SESSION['admin']['id'] == $id) {
        session_unset();
        session_destroy();
    }
}


?>
<br>
<div class="text-center">
    <h2>View Articles </h2>
</div>


<div class="container-md ">
    <div class="row">
        <div class="col-md-7 mt-5 mx-auto">
            <?php foreach ($query as $data) {
                $uimage = $data['image']
            ?>
                <div class="card text-white bg-dark mb-2 " style="width: 40rem;">
                    <div class="card-body ">
                        <div class="card-header">
                            <div class="media ">
                                <img src="<?= $uimage ?>" class="mr-3 rounded-circle" height="40" width="50" alt="...">
                                <div class="media-body">
                                    <h6 class="text-light"><?= $data['auther'] ?></h6>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title"><?= $data['title'] ?></h5>
                        <p class="card-text"><?= $data['description'] ?></p>
                    </div>
                    <img class="card-img-bottom" src="/ODC BackEnd/lawer_office/article/<?= $data['post_image'] ?>" alt="Card image cap">

                    <div class="card-footer d-flex justify-content-center">
                        <a href="list_article.php?delete=<?= $data["id"] ?>" class="btn btn-danger ">delete</a>
                        <a href="update_article.php?edit=<?= $data["id"] ?>" class="btn btn-info mx-5">edite</a>
                    </div>
                </div>

                <br>
            <?php } ?>
        </div>
    </div>
</div>

<?php

include '../shared/footer.php'
?>