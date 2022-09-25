<?php

include './shared/header.php';
include './shared/navbar.php';
include './genral/DB.php';
include './genral/functions.php';
//select employeesa
loginauth();
$slelct = "SELECT * FROM `articales` ORDER BY update_time desc";
$query = mysqli_query($connication, $slelct);
?>
<div>
    <br>
    <div class="text-center">
        <h2>View Articles </h2>
    </div>


    <div class="container " >
        <div class="row">
            <div class="col-md-7 mt-4 mx-auto">
                <?php foreach ($query as $data) { ?>
                    <div class="card text-white bg-dark mb-2 " style="width: 40rem;">
                        <div class="card-body ">
                            <div class="card-header">
                                <div class="media ">
                                    <div class="media-body">
                                        <h6 class="text-light"><?= $data['auther'] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title"><?= $data['title'] ?></h5>
                            <p class="card-text"><?= $data['description'] ?></p>
                        </div>
                        <img class="card-img-bottom" src="/ODC BackEnd/lawer_office/article/<?= $data['post_image'] ?>" alt="Card image cap">
                    </div>

                    <br>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
include './shared/footer.php';
?>