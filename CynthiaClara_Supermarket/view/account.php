<?php
include 'header.php';
include '../model/user.php';
$user = new User();
$current = $user->specificUser($_SESSION['user']);
?>

<div class="container">
    <div class="card mx-auto mt-5">
        <!-- <img class="card-img-top img-fluid" src="../assets/profile.jpg" alt="Alfonso Darren Vincentio"> -->
        <div class="card-body">
            <h5 class="card-title text-center"><?= $current['first_name'] . " " . $current['last_name'] ?></h5>
            <!-- <p class="card-text"></p> -->
        </div>
        <div class="row">
            <div class="col-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">User ID </li>
                    <li class="list-group-item">Name </li>
                    <li class="list-group-item">Role </li>
                    <li class="list-group-item">Address </li>
                </ul>
            </div>
            <div class="col-10">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> : <?= $current['user_id'] ?></li>
                    <li class="list-group-item"> : <?= $current['first_name'] . " " . $current['last_name'] ?></li>
                    <li class="list-group-item"> : <?= $user->role($current['role_id']) ?></li>
                    <li class="list-group-item"> : <?= $current['address'] ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

