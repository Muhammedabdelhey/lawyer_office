<?php

function testMessage($connication, $message)
{
    if ($connication) {
        echo "<div class='alert alert-success mx-auto w-50'>
      $message True Proccess
      </div>";
    } else {
        echo "<div class='alert alert-danger mx-auto w-50'>
        $message False Proccess
        </div>";
    }
}


function path($go)
{
    echo "<script>
    location.replace('/ODC%20BackEnd/lawer_office/$go')
    </script>";
}
function loginauth()
{
    if (!isset($_SESSION['lowar']) && !$_SESSION['admin']) {
        path("auth/login.php");
    }
}
function auth()
{
    if (!isset($_SESSION['admin'])) {
        path("auth/login.php");
    }
}
function admin_auth()
{
    if ($_SESSION['admin']) {
        if ($_SESSION['admin']['role'] != 0) {
            path('404.php');
        }
    } else {
        path('404.php');
    }
}

function check_image($image_name)
{
    $location = "$image_name";
    if (!empty($_FILES['image']['name'])) {
        unlink($image_name);
        $image_name = time()  . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/$image_name";
        move_uploaded_file($tmp_name, $location);
    }
    return $location;
}

/*function lowar_auth()
{
    if (!isset($_SESSION['lowar'])) {
        path("auth/login.php");
    }
}*/
