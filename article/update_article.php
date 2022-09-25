<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
loginauth();
$id = $_GET['edit'];
$select = "SELECT * FROM `articales` WHERE `id`=$id";
$query = mysqli_query($connication, $select);
$result = mysqli_fetch_assoc($query);
$image_name = $result['post_image'];
$location = check_image($image_name);
if (isset($_POST['update'])) {
    $title = $_POST["title"];
    $description = $_POST['description'];
    $update = "UPDATE `articales` SET  `title`='$title',`description`='$description',`update_time`=Default,`post_image`='$location' WHERE `id`=$id";
    mysqli_query($connication, $update);
    testMessage($update, "update");
    path('article/list_article.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Edite Article </h2>
                </div>
                <div class="form-group">
                    <label for="name">Title </label><br>
                    <input type="text" class="form-control" name="title" value="<?= $result['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Description </label><br>
                    <input type="text" name="description" class="form-control" value="<?= $result['description']?>">
                </div>
                <div class="form-group">
                    <label for="">Articale Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-primary" name="update">Update Article</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>