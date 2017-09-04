
<?php 
    session_start();
    
    if($_SESSION['signed_in']) {
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap-reboot.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <?php
                    session_start();
                    if(isset($_SESSION['msg'])) {
                        echo '<p class="alert alert-success">' . $_SESSION['msg'] . '</p>';
                        unset($_SESSION['msg']);
                    }

                    if(isset($_SESSION['error'])) {
                        echo '<p class="alert alert-danger">' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']);
                    }
                ?>
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card">Login</p>
                <form class="form-signin" action="login.php" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                </form><!-- /form -->
                <a href="cadastro.php" class="forgot-password">
                    Gostaria de se cadastrar?
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->

    </body>
</html>