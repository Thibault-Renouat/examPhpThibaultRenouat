
<form method="post" >

    <label for="titre">  Titre de la Compétence  </label>
    <input type="text" name="titre" placeholder="titre de la compétence"><br><br>

    <label for="pet-select">Note de la compétence</label>
    <select name="note" >
        <option value="">--choississez une note--</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
    </select><br><br>
    <input type="submit">

</form>

<?php
require'includes.php';
$errors=[];
if ( $_SERVER['REQUEST_METHOD'] === 'POST') {

/*    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    die();*/


    $errors = validationAddCompetence();
    if (count($errors) === 0) {
        addBddCompetence($pdo);
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
