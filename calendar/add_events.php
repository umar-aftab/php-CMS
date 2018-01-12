<?php
// Values received via ajax
$json_array["title"]=$_POST["title"];
$json_array["start"]=$_POST["start"];
$json_array["end"]=$_POST["end"];
//$json_array["url"]=$_POST["url"];


$start = new DateTime($json_array['start'],new DateTimeZone('Europe/London'));
$end = new DateTime($json_array['end'],new DateTimeZone('Europe/London'));


$title =$json_array["title"];
$start =$start->format("Y-m-d H:i:s");
$end =$end->format("Y-m-d H:i:s");
//$url = $json_array["url"];

// connection to the database
try {
//$pdo = new PDO('mysql:host=localhost;dbname=alamdeve_calendar', 'alamdeve_umar', 'Umar@295');
$pdo = new PDO('mysql:host=localhost;dbname=alisbaah_merkezalisbaah', 'alisbaah_admin', 'AlIsbaah@2015');
//$pdo = new PDO('mysql:host=localhost;dbname=merkezalisbaah', 'umar', 'Umar@295');
} catch(Exception $e) {
exit('Unable to connect to database.');
}


$sql  = "INSERT INTO "
      .   "`evenement` "
      . "SET "
      .   "`title`   = :title, "
      .   "`start`   = :start, " 
      .   "`end`     = :end "; 
     // .   "`url`     = :url ";

$stmt   = $pdo->prepare($sql);
$result = $stmt->execute(array(':title'=>$title, ':start'=>$start, ':end'=>$end/*,  ':url'=>$url*/));
if (!$result) {
		 	print_r($pdo->errorInfo());
			
}	


/*$sql = 'INSERT INTO  `evenement` ( `title`,`start`,`end`,`url`) VALUES( ?, ?, ?, ? )';
$stmt = $pdo->prepare($sql);
$stmt->execute(array($title, $start, $end, $url ));

// check for errors
if($stmt->errorCode() == 0) {
    $id = $pdo->lastInsertId(); 

}
else {
    // had errors
    $errors = $stmt->errorInfo();
    print_r($errors);
}
*/
	
?>