<?php

$json_array["id"]=$_POST["id"];
$id = $json_array["id"];
try {
//$pdo = new PDO('mysql:host=localhost;dbname=alamdeve_calendar', 'alamdeve_umar', 'Umar@295');
$pdo = new PDO('mysql:host=localhost;dbname=alisbaah_merkezalisbaah', 'alisbaah_admin', 'AlIsbaah@2015');
//$pdo = new PDO('mysql:host=localhost;dbname=merkezalisbaah', 'umar', 'Umar@295');
} catch(Exception $e) {
exit('Unable to connect to database.');
}
$sql = "DELETE from `evenement` WHERE `id`=".$id;
$q = $pdo->prepare($sql);
$q->execute();

?>