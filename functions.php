<?php
require_once 'bdd-connect.php';

function validateRegister($pdo){

    $req = $pdo->prepare(
        'SELECT * FROM user where email=:email');
    $req->execute([
        'email' => $_POST['email']
    ]);

    /*    var_dump($req->fetch());
        die();*/
    $errors = [];
    if($req->fetch() != false){

        $errors[]= 'email déja utilisé !!';

    }

    if (empty($_POST['email'])) {
        $errors[] = 'Veuillez saisir un email';
    }
    if (empty($_POST['nom'])) {
        $errors[] = 'Veuillez saisir un nom';
    }
    if (empty($_POST['prenom'])) {
        $errors[] = 'Veuillez saisir un prénom';
    }
    if (empty($_POST['mot_de_passe'])) {
        $errors[] = 'Veuillez saisir un mot de passe';
    }


    return $errors;

}

function addUser($pdo) {

    $req = $pdo->prepare(
        'INSERT INTO user (nom, prenom, mot_de_passe , email)
VALUES(:nom, :prenom, :mot_de_passe , :email)');
    $req->execute([
        'email' => $_POST['email'],
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'mot_de_passe' => md5($_POST['mot_de_passe'])
    ]);


}


function validateLoginForm($pdo){

    $req = $pdo->prepare(
        'SELECT * FROM user where email=:email AND mot_de_passe=:mot_de_passe');
    $req->execute([
        'email' => $_POST['email'],
        'mot_de_passe' => md5($_POST['mot_de_passe'])
    ]);
        $rep=$req->fetch();
/*        var_dump($req->fetch());
        die();*/

    $errors = '';
    if($rep === false){

        $errors= 'erreur dans votre email ou mot de passe, ou bien vous n\'êtes pas enregistré';

    }

    return ['errors'=>$errors, 'prenom'=>$rep['prenom']];

}

function validationAddCompetence(){

/*    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';*/


    $errors=[];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir le titre de la compétence';
    }
    if (empty($_POST['note'])) {
        $errors[] = 'Veuillez saisir la note de la compétence';
    }

    return $errors;
}

function validationAddExperience(){

/*echo '<pre>';
var_dump($_POST);
echo '</pre>';
die();*/

    $errors=[];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir le titre de l\'expérience';
    }
    if (empty($_POST['description'])) {
        $errors[] = 'Veuillez saisir la description de l\'expérience';
    }
    if (empty($_POST['date_debut'])) {
        $errors[] = 'Veuillez saisir la date de début de l\'expérience';
    }
    if (empty($_POST['date_fin'])) {
        $errors[] = 'Veuillez saisir la date de fin de l\'expérience';
    }


    return $errors;


}

function addBddCompetence($pdo){

    $req = $pdo->prepare(
        'INSERT INTO competence(titre, note)
VALUES(:titre, :note)');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note']
    ]);

}

function addBddExperience($pdo){

    $req = $pdo->prepare(
        'INSERT INTO experience(titre, description, date_debut, date_fin)
VALUES(:titre, :description, :date_debut, :date_fin)');
    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin']
    ]);


}

function deleteCompetence($pdo,$id){

    $res = $pdo->prepare('DELETE FROM competence WHERE id = :id');
    $res->execute(['id' => $id]);


}

function getOneCompetence($pdo,$id){

    $res = $pdo->prepare('SELECT * FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $fetchRes = $res->fetch();


}

function updateCompetence($pdo,$id){

/*    echo '<pre>';
    var_dump((int)$_POST['note']);
    echo '</pre>';
die();*/


    $req = $pdo->prepare('UPDATE competence SET titre = :titre, note = :note WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        'id' => $id
    ]);


}