<?php
include_once 'includes.php';

$id = $_GET['id'];
deleteExperience($pdo, $id);
header('Location: index.php');
