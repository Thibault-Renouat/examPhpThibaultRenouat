<?php
include_once 'includes.php';

$id = $_GET['id'];
deleteCompetence($pdo, $id);
header('Location: index.php');
