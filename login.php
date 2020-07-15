<?php

require_once 'functions.php';
require_once 'bdd-connect.php';

?>


<form method="post">

    <label for="email">Votre email</label>
    <input type="email" name="email">
    <label for="mot_de_passe">Votre mot de passe</label>
    <input type="password" name="mot_de_passe">
    <input type="submit">
</form>
<?php

$errors = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$errors = validateLoginForm($pdo)['errors'];
$prenom = validateLoginForm($pdo)['prenom'];

/*var_dump($prenom);
die();*/
if ($errors !== '') {
echo '
<ul>';

    echo '
    <li>';
        echo $errors;
        echo '
    </li>
    ';

    }

    if ($errors == '') {

    session_start();
    $_SESSION['prenom'] = $prenom;
    header('Location: index.php');


    }

    }
