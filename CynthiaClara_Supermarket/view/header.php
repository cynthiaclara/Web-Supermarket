<?php
session_start();
if (isset($_SESSION['role']))
{
    if ($_SESSION['role'] == 1)
    {
        $role = 'admin';
    }
    else if ($_SESSION['role'] == 2)
    {
        $role = 'manager';
    }
    else if ($_SESSION['role'] == 3)
    {
        $role = 'cashier';
    }
    else if ($_SESSION['role'] == 4)
    {
        $role = 'customer';
    }
    else
    {
        $role = 'index';
    }
}
else
{
    $role = 'index';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"
        integrity="sha384-2QMA5oZ3MEXJddkHyZE/e/C1bd30ZUPdzqHrsaHMP3aGDbPA9yh77XDHXC9Imxw+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
        integrity="sha384-EkHEUZ6lErauT712zSr0DZ2uuCmi3DoQj6ecNdHQXpMpFNGAQ48WjfXCE5n20W+R" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
        integrity="sha384-L74JDRkaoB7PWnReNepwX6+kSckc13TJXrka4EerY9jxQxSDl0dTguSLcA7dEfq8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
        integrity="sha384-dsXH1jw5mvdtskz6tkzogTCdKWJv4k12j2BOHq3okVzlZiIsQhQXSh0I86ggUPPf" crossorigin="anonymous">
    </script>

    <title>USHOP</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <strong><a class="navbar-brand" href="<?= $role ?>.php">USHOP</a></strong>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                if (isset($_SESSION['username']))
                {
                    echo
                    "
                    <ul class='navbar-nav ml-auto mt-2 mt-lg-0'>
                        <li class='nav-item dropdown'>
                            <a href='#' class='nav-link dropdown-toggle' id='more' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Welcome " . $_SESSION['username'] .
                            "</a>
                            <div class='dropdown-menu' aria-labelledby='more'>
                                <a href='profile.php' class='dropdown-item'>Profile</a>
                                <a href='account.php' class='dropdown-item'>Account</a>
                                <a href='../controller/logout.php' class='dropdown-item'>Logout</a>
                            </div>
                        </li>
                    </ul>    
                    ";
                }
            ?>
        </div>
    </nav>