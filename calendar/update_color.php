<?php 
$json_array["id"]=$_POST["id"];
$json_array["color"]=$_POST["color"];

$id = $json_array["id"];
$color =$json_array["color"];

try {
//$pdo = new PDO('mysql:host=localhost;dbname=alamdeve_calendar', 'alamdeve_umar', 'Umar@295');
$pdo = new PDO('mysql:host=localhost;dbname=alisbaah_merkezalisbaah', 'alisbaah_admin', 'AlIsbaah@2015');	
//$pdo = new PDO('mysql:host=localhost;dbname=merkezalisbaah', 'umar', 'Umar@295');
} catch(Exception $e) {
exit('Unable to connect to database.');
}
 // update the records
$sql = "UPDATE `evenement` SET `color`=? WHERE `id`=?";
$q = $pdo->prepare($sql);
$q->execute(array($color,$id));


?>