<?php
require_once __DIR__ . '/login.php';

$_session['number'] = rand(0,5);
$_SESSION['login'] = null;

header('Location: index.php');

?>