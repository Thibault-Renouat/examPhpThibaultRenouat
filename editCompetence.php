<?php
require_once 'includes.php';
$idCompetence = $_GET['id'];

$competence = getOneCompetence($pdo, $idCompetence);

?>

<form method="post" >

    <label for="titre">  Titre de la Compétence  </label>
    <input type="text" name="titre" value="<?php echo($competence['titre'])  ?>"><br><br>

    <label for="pet-select">Note de la compétence</label>
    <select name="note" >
        <option value="<?php echo($competence['note'])  ?>"><?php echo($competence['note'])  ?></option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
    </select><br><br>
    <input type="submit">

</form>

<?php
$errors=[];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
$errors = validationAddCompetence();
if (count($errors) === 0) {
updateCompetence($pdo, $idCompetence);
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
