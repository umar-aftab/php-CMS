 <?php
 ini_set('display_errors', 1);
// List of events
$json = array();
$teacher = isset($_GET['teachermale']) ? $_GET['teachermale'] : '';

 // connection to the database
 try {
    //$pdo = new PDO('mysql:host=localhost;dbname=alamdeve_calendar', 'alamdeve_umar', 'Umar@295');
    $pdo = new PDO('mysql:host=localhost;dbname=alisbaah_merkezalisbaah', 'alisbaah_admin', 'AlIsbaah@2015');
    //$pdo = new PDO('mysql:host=localhost;dbname=merkezalisbaah', 'umar', 'Umar@295');
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
 // Query that retrieves events

if ($teacher === ''){
 $requete = "SELECT * FROM `evenement` ORDER BY id";
 get_all($requete,$pdo);
}else{
   $requete = "SELECT * FROM `evenement` WHERE `title` = ? ORDER BY id";
   $stmt = $pdo->prepare($requete);
   get_few($stmt, $teacher);

}


function get_all($requete,$pdo){
 $resultat = $pdo->query($requete) or die(print_r($pdo->errorInfo()));
 $events = array();
 $dbEvents = $resultat->fetchAll(PDO::FETCH_ASSOC);

    foreach ($dbEvents as $event) {
                $event['allDay'] = false;
            $events[] = $event;
    }


 echo json_encode($events);
}

function get_few($stmt, $teacher){

 if ($stmt) {
            if ($stmt->execute(array($teacher))) {
                $events = array();
                $dbEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dbEvents as $event) {
                    $event['allDay'] = false;
                    $events[] = $event;
                }
            } else {
                        // check for error
                print_r($stmt->errorInfo());
            }
        }
    // print_r($events);
   // $events = array_values((array)$events);
    echo json_encode($events);
}


?>