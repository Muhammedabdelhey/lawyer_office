<?php
include "../genral/DB.php";
include "../genral/functions.php";
include "../shared/header.php";
include "../shared/navbar.php";
// insert employee
loginauth();
if (isset($_POST["insert"])) {
    $title = $_POST["title"];
    if(isset($_SESSION['admin'])){
        $auther=$_SESSION['admin']['name'];
        $auther_image=$_SESSION['admin']['image'];
    }
    else if(isset($_SESSION['lowar'])){
        $auther=$_SESSION['lowar']['name'];
        $auther_image=$_SESSION['lowar']['image'];
    }
    $description=$_POST['description'];
    // Image code
    //create new name for image 
    $image_name = time()  . $_FILES['image']['name'];
    //get copy of  image from pc to server(upload folder )
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);
    $insert = "INSERT INTO `articales` VALUES (null,'$title','$description','$auther','$auther_image',Default,Default,'$location')";
    $test = mysqli_query($connication, $insert);
    testMessage($test,"insert");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Add Article </h2>
                </div>
                <div class="form-group">
                    <label for="name">Title </label><br>
                    <input  type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="email">Description </label><br>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Articale Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-primary" name="insert">Add Article</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>