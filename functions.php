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

function addBddCompetence($pdo){

    $req = $pdo->prepare(
        'INSERT INTO competence(titre, note)
VALUES(:titre, :note)');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note']
    ]);

}

function getAllCompetences(){



}