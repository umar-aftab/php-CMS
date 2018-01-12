<?php

/* Values received via ajax */
$json_array["id"]=$_POST["id"];
$json_array["title"]=$_POST["title"];
$json_array["start"]=$_POST["start"];
$json_array["end"]=$_POST["end"];

$start = new DateTime($json_array['start'],new DateTimeZone('Europe/London'));
$end = new DateTime($json_array['end'],new DateTimeZone('Europe/London'));

$title =$json_array["title"];
$start =$start->format("Y-m-d H:i:s");
$end =$end->format("Y-m-d H:i:s");
$id = $json_array["id"];


// connection to the database
try {
//$pdo = new PDO('mysql:host=localhost;dbname=alamdeve_calendar', 'alamdeve_umar', 'Umar@295');
$pdo = new PDO('mysql:host=localhost;dbname=alisbaah_merkezalisbaah', 'alisbaah_admin', 'AlIsbaah@2015');	
//$pdo = new PDO('mysql:host=localhost;dbname=merkezalisbaah', 'umar', 'Umar@295');
} catch(Exception $e) {
exit('Unable to connect to database.');
}
 // update the records
$sql = "UPDATE `evenement` SET `title`=?, `start`=?, `end`=? WHERE `id`=?";
$q = $pdo->prepare($sql);
$q->execute(array($title,$start,$end,$id));
?>