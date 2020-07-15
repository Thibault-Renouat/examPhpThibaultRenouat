<?php
require_once 'bdd-connect.php';
require_once 'functions.php';
if ($bddOk===1) {
    echo 'BDD connectée <hr><br>';
}




?>
<a href="login.php">J'ai déja un compte</a>
    <hr><br>

<form action="register.php" method="post">

    <label for="email">Votre email</label>
    <input type="email" name="email" placeholder="email">
    <label for="prenom">Votre Prénom</label>
    <input type="text" name="prenom" placeholder="Prénom">
    <label for="nom">Votre Nom</label>
    <input type="text" name="nom" placeholder="Nom">
    <label for="mot_de_passe">mot de passe</label>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe">
    <input type="submit">
</form>
    <br><br>

<?php

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = validateRegister($pdo);
    if ($errors !== 0){
        echo '<ul>';
        foreach ($errors as $err){
            echo '<li>';
            echo $err;
            echo'</li>';

        }



    }
        if( count($errors) === 0) {

            addUser($pdo);
/*            echo 'ajout bdd ok';
            die();*/
            header('Location: login.php');


        }
}
