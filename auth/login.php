<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
$error = "";
$errorColor = "";
if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $newpassword = sha1($password);
    $select = "SELECT * FROM `admins` where `email` ='$email' and `password` = '$newpassword'";
    $result = mysqli_query($connication, $select);
    $numRows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($numRows == 1) {
        $_SESSION['admin'] = [
            'email' => $email,
            'role'=>$row['role'],
            'id'=>$row['id'],
            'image'=>$row['image'],
            'name'=>$row['name']
        ];
        path("index.php");
    } 
    
    else {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $newpassword = sha1($password);
        $select = "SELECT * FROM `lowyers` where `email` ='$email' and `password` = '$newpassword'";
        $result = mysqli_query($connication, $select);
        $numRows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($numRows == 1) {
            $_SESSION['lowar'] = [
                'email' => $email,
                'role'=>$row['role'],
                'id'=>$row['id'],
                'image'=>$row['image'],
                'name'=>$row['name']
            ];
            path("index.php");
        }
       
    }
    $error =  "Wrong Data";
    $errorColor = "red";
}

?>

<h1 class="text-center">Login </h1>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for=""> Email : <span class="text-danger"><?= $error ?></span></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for=""> Password <span class="text-danger"><?= $error ?></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control" type="password" name="password">
                </div>

                <button name="login" class="btn btn-info"> login </button>

            </form>
        </div>
    </div>
</div>

<?php
include '../shared/footer.php'
?>