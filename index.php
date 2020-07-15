<?php
include_once 'assets/stylesheets.php';
require_once 'bdd-connect.php';
session_start();
if ($bddOk===1) {
    echo 'BDD connectée<hr>';
    }

/*if (!$_SESSION['utilisateur']) {
    header('Location: register.php');
}*/
$connectedUser=false;
if ($_SESSION['prenom']){
    $connectedUser=true;
    echo $_SESSION['prenom'],'<hr>';
}else{
    $connectedUser=false;
}

/*var_dump($connectedUser);
die();*/

$deletelink = "";
$detaillink = "";
$editlink = "";


$getCompetences = $pdo->query('SELECT * FROM competence');
$getExperiences = $pdo->query('SELECT * FROM experience');
?>

<?php
/*echo '<pre>';
var_dump($connectedUser);
echo '</pre>';
die();*/

if ($connectedUser==false){
    echo '<a href="login.php">Se connecter</a>';
    }elseif ($connectedUser==true){
    echo '<a href="logout.php" style="color: red">Se deconnecter</a>';
} ?>
<hr><br>

<div >
    <h1 >Thibault RENOUAT</h1>
</div>
<br><hr>

<div id="competences">
    <?php
    if ($connectedUser==1) {
    echo '<a href="addCompetence.php"><button>Ajouter une compétence</button></a>';
    }?>


    <h2>Compétences</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Note</th>
            <?php
            if ($connectedUser==1) {
                echo '<th scope="col">Modification</th>';
            }?>

        </tr>
        </thead>
        <tbody>
<!--        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <?php
/*            if ($connectedUser==1) {
                echo '<td><a href="editCompetence.php">Editer</a><br>
                        <a href="deleteCompetence.php" style="color: red">Supprimer</a></td>';
            }*/?>
        </tr>
-->
        <?php

        while ($data = $getCompetences->fetch()){
            ?>
            <tr>
                <td ><?php echo($data['titre'])?></td>
                <td><?php echo($data['note'])?></td>
                <td><?php if ($connectedUser==1) {
                    $deletelink = "deleteCompetence.php?id=" . $data['id'];
                    $detaillink = "detailCompetence.php?id=" . $data['id'];
                    $editlink = "editCompetence.php?id=" . $data['id'];

                   echo'<a href='; echo $editlink; echo'>Editer</a><br>';
                   echo'<a href='; echo $deletelink.' '; echo'style="color: red">Supprimer</a><br>';


                }
                    ?></td>


            </tr>
            <?php
        }
//        $reponse->closeCursor(); ?>


        </tbody>
    </table></div>
<br><hr>

<div id="experiences">
    <?php
    if ($connectedUser==1) {
        echo '<a href="addExperience.php"><button>Ajouter une expérience</button></a>';
    }?>



    <h2>Expériences</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Date de début</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Date de fin</th>
            <?php
            if ($connectedUser==1) {
                echo '<th scope="col">Modification</th>';
            }?>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>Otto</td>
            <?php
            if ($connectedUser==1) {
                echo '<td><a href="editCompetence.php">Editer</a><br>
                        <a href="deleteCompetence.php" style="color: red">Supprimer</a></td>';
            }?>

        </tr>
<?php
        while ($dataExp = $getExperiences->fetch()){
        ?>
        <tr>
            <td ><?php echo($dataExp['titre'])?></td>
            <td><?php echo($dataExp['description'])?></td>
            <td><?php echo($dataExp['date_debut'])?></td>
            <td><?php echo($dataExp['date_fin'])?></td>
            <td><?php if ($connectedUser==1) {
                    $deletelinkExp = "deleteExperience.php?id=" . $dataExp['id'];
                    $detaillinkExp = "detailExperience.php?id=" . $dataExp['id'];
                    $editlinkExp = "editExperience.php?id=" . $dataExp['id'];

                    echo'<a href='; echo $editlinkExp; echo'>Editer</a><br>';
                    echo'<a href='; echo $deletelinkExp.' '; echo'style="color: red">Supprimer</a><br>';


                }
                ?></td>


        </tr>
        <?php
        }
//        $reponse->closeCursor(); ?>

        </tbody>
    </table>
</div>