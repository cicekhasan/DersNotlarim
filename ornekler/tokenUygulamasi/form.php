<?php
require 'db.php';
$id = 1;
$hakkinda = $_POST['hakkinda'];
$sorgu = $db->prepare('UPDATE uyeler SET hakkinda = ? WHERE id = ?');
$sorgu->execute([$hakkinda, $id]);
header('Location:index.php');
