<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php
    if(!empty($_POST)&& $_POST['login']&& $_POST['password']) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $test = new ManageUser($login,$password);
    echo $test->register();
    }
?>


                    <form id="inscription_form" action="" method="post">
                        <h3>Création de compte</h3>
                        <input type="text" name="login" id="login" placeholder="Login*" required minlength="3">
                        <input type="password" name="password" id="password" placeholder="Password*" required minlength="3">
                        </select>
                        <input class="submit" id="submit" type="submit" value="Envoyer">
                        <i class="small">* Champs obligatoires avec 3 caractères minimum</i>       
                    </form>

    <div id="error_form">
        <?php
        if(empty($_POST['login'])&&($_POST['password'])){
            echo "<div id='error-message'>Il faut spécifier un login ! Voyons !</div>";
        }

        if(empty($_POST['password'])&&($_POST['login'])){
            echo "<div id='error-message'>Il faut spécifier un mot de passe !</div>";
        }
        ?>        
    </div>
