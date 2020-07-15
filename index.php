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

echo $_SESSION['prenom'],'<hr>';
?>


<a href="login.php">Se connecter</a>
<a href="logout.php">Se deconnecter</a>
<hr><br>

<div >
    <h1 >Thibault RENOUAT</h1>
</div>
<br><hr>

<div id="competences">
    <h2>Compétences</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Note</th>
            <?php
            if ($_SESSION['prenom']) {
                echo '<th scope="col">Modification</th>';
            }?>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
        </tr>
        </tbody>
    </table></div>
<br><hr>

<div id="experiences">
    <h2>Expériences</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Date de début</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Date de fin</th>
            <?php
            if ($_SESSION['prenom']) {
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
        </tr>
        </tbody>
    </table>
</div>