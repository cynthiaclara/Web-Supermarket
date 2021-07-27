<?php
include 'header.php';
include '../model/user.php';
if (isset($_SESSION['role']))
{
    if ($_SESSION['role'] == 1) 
    {
        header('Location: admin.php');
    }
    else if ($_SESSION['role'] == 2)
    {
        header('Location: manager.php');
    }
    else if ($_SESSION['role'] == 3)
    {
        header('Location: cashier.php');
    }
    else if ($_SESSION['role'] == 4)
    {
        header('Location: customer.php');
    }
    else
    {
        header('Location: ../');
    }
}
$user = new User();
?>

<script>
    $(document).ready(() => {
        $('#login').modal();
    });

    showHide = () => {
        let x = document.getElementById("password");
        let y = document.getElementById("toggle");

        if (x.type === "password")
        {
            x.type = "text";
            y.className = "fad fa-eye-slash";
        }
        else
        {
            x.type = "password";
            y.className = "fad fa-eye";
        }
    }
</script>


<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">USHOP</h5>
            </div>
            <form action="../controller/auth.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" placeholder="1XXX">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-warning" onclick="showHide()"><i class="fad fa-eye" id="toggle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    if (isset($_SESSION['msg']))
                    {
                        echo "<p>" . $_SESSION['msg'] . "</p>";
                    }
                    ?>
                    <input type="submit" class="btn btn-primary" value="Sign In">
                </div>
            </form>
        </div>
    </div>
</div>


