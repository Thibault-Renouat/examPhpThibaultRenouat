<?php
require_once 'includes.php';
include_once 'assets/stylesheets.php'
?>

<form method="post">

    <label for="titre">Titre</label>
    <input type="text" name="titre"><br><br>

    <label for="description" style="display: block;
    margin-bottom: 10px;">Description</label>
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <br><br>

    <label for="date_debut">Date de début</label>
    <input type="date" name="date_debut"><br><br>

    <label for="date_fin">Date de fin</label>
    <input type="date" name="date_fin"><br><br>

    <input type="submit">

</form>

<?php
$errors=[];
if ( $_SERVER['REQUEST_METHOD'] === 'POST') {

    /*    echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        die();*/


    $errors = validationAddExperience();
    if (count($errors) === 0) {
        addBddExperience($pdo);
        header('Location: index.php');
    } else {

        echo '<ul>';
        foreach ($errors as $err) {
            echo '<li>';
            echo $err;
            echo '</li>';


        }

    }
}

?>


