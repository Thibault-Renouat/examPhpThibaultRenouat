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
$connectedUser=0;
if ($_SESSION['prenom']){
    $connectedUser=1;
    echo $_SESSION['prenom'],'<hr>';
}

/*var_dump($connectedUser);
die();*/

$deletelink = "";
$detaillink = "";
$editlink = "";


$getCompetences = $pdo->query('SELECT * FROM competence');

?>


<a href="login.php">Se connecter</a>
<a href="logout.php">Se deconnecter</a>
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
                <td><?php echo($data['titre'])?></td>
                <td><?php echo($data['note'])?></td>
                <?php if ($connectedUser==1) {
                    $deletelink = "deleteCompetence.php?id=" . $data['id'];
                    $detaillink = "deleteCompetence.php?id=" . $data['id'];
                    $editlink = "deleteCompetence.php?id=" . $data['id'];

                }
                    ?>
                <td>
                    <a href=<?php echo $detaillink?>>Détail</a><br>
                    <a href=<?php echo $editlink?>>Editer</a><br>
                    <a href=<?php echo $deletelink?>. style="color: red">Supprimer</a></td>';

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
        </tbody>
    </table>
</div>