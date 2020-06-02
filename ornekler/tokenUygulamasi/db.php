<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'hasancicek');

if ($SERVER['REQUEST_METHOD'] == 'POST') {
  if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
    die('Geçersiz CSRF Token!');
  }
}
# Altta olacak!
$_SESSION['token'] = uniqid();
?>
