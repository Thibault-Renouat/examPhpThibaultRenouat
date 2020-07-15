<?php
require_once 'includes.php';
include_once 'assets/stylesheets.php';
$idExperience = $_GET['id'];

$experience = getOneExp($pdo, $idExperience)

?>


<form method="post">

    <label for="titre">Titre</label>
    <input type="text" name="titre" value="<?php echo $experience['titre'] ?>"><br><br>

    <label for="description" style="display: block;
    margin-bottom: 10px;">Description</label>
    <textarea name="description" id="" cols="30" rows="10" ><?php echo $experience['description'] ?></textarea>
    <br><br>

    <label for="date_debut">Date de début</label>
    <input type="date" name="date_debut" value="<?php echo $experience['date_debut'] ?>"><br><br>

    <label for="date_fin">Date de fin</label>
    <input type="date" name="date_fin" value="<?php echo $experience['date_fin'] ?>"><br><br>

    <input type="submit">

</form>


<?php
$errors=[];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = validationAddExperience();
    if (count($errors) === 0) {
        updateExperience($pdo, $idExperience);
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

