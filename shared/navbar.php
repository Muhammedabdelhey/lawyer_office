<?php
$flage = true;
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    echo "<script>
    location.replace('/ODC%20BackEnd/lawer_office/auth/login.php')
    </script>";
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/ODC%20BackEnd/lawer_office/">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php if (isset($_SESSION['admin'])) { 
                 $image = "admin".$_SESSION['admin']['image'];
                 $name = $_SESSION['admin']['name']; ?>
                 <li class="nav-item ">
                    <a class="nav-link" href="/ODC%20BackEnd/lawer_office/admin/show_admin.php">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Lawyers
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ODC%20BackEnd/lawer_office/lawyer/add_Lawyer.php">Create New Lawyers</a>
                        <a class="dropdown-item" href="/ODC%20BackEnd/lawer_office/lawyer/list_Lawyers.php">List All Lawyers</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Admins
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ODC%20BackEnd/lawer_office/admin/add_admin.php">Create New Admin</a>
                        <a class="dropdown-item" href="/ODC%20BackEnd/lawer_office/admin/list_admins.php">List All Admins</a>
                    </div>
                </li>

            <?php } else if (isset($_SESSION['lowar'])) {
                $image ="lawyer". $_SESSION['lowar']['image'];
                $name = $_SESSION['lowar']['name']; ?>
                <li class="nav-item ">
                    <a class="nav-link" href="/ODC%20BackEnd/lawer_office/lawyer/show_lawyer.php">Profile <span class="sr-only">(current)</span></a>
                </li>
            <?php } ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Articles
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/ODC%20BackEnd/lawer_office/article/add_article.php">Create New Articles</a>
                    <a class="dropdown-item" href="/ODC%20BackEnd/lawer_office/article/list_article.php">List All Articles</a>
                </div>
            </li>

        </ul>
        <div class="media mx-5">
            <img src="/ODC BackEnd/lawer_office/<?= $image ?>" class="mr-3 rounded-circle" height="40" width="50" alt="...">
            <div class="media-body">
                <h6 class="text-light"><?= $name ?></h6>
            </div>
        </div>

        <form action="">
            <button name="logout" class="btn btn-danger mx-3"> Logout </button>
        </form>

    </div>
</nav>