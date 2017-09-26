<?php
    require('start.php');    
    require('partials/_signed_in.php');

    use App\utils\Alert as Alert;
?>

<!DOCTYPE html>
<html>
    <?php require_once('partials/_head.php'); ?>
    <body>
        <div class="container">
            <div class="card card-container">
                <?php
                    Alert::showMessages();
                ?>
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card">Recuperação de Senha</p>
                <form class="form-signin" action="/users/recover" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Qual cidade onde nasceu?" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Trocar Senha</button>
                </form><!-- /form -->
                <a href="/users/sign_in" class="forgot-password">
                    Já tem cadastro?
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->

    </body>
</html>