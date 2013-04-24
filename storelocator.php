<?php
require('classes/database.class.php');
// Get parameters from URL
$center_lat = ( isset( $_GET["lat"] ) ? $_GET["lat"] : 43 ); # You could replace these "0"s with the
$center_lng = ( isset( $_GET["lng"] ) ? $_GET["lng"] : -79 ); # Lat/Lng of a default location.
$radius     = ( isset( $_GET["radius"] ) ? $_GET["radius"] : 30 ); # Again, default radius.
// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$dbh = Database::getDB();
//Connect to database
//$dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);
//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    //Connect to database
    //$dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // Prepare statement 1
    $searchStmt = $dbh->prepare("SELECT lat,lng FROM markers WHERE name LIKE 'shop%' ");
    // Assign parameters
    $searchStmt->bindParam(1,$name);
    $searchStmt->setFetchMode(PDO::FETCH_ASSOC);
    $searchStmt->execute();
    $row = $searchStmt->fetch();
    $center_lat = $row['lat'];
    $center_lng = $row['lng'];
    // Start XML file, create parent node
    $dom = new DOMDocument("1.0");
    header("Content-type: text/xml");
    $node = $dom->createElement("markers");
    $parnode = $dom->appendChild($node);
    // Prepare statement 2
    $markerStmt = $dbh->prepare("SELECT  name, address, hours, phone, lat, lng, ( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < ? ORDER BY distance LIMIT 0 , 20");
    // Assign parameters
    $markerStmt->bindParam(1,$center_lat);
    $markerStmt->bindParam(2,$center_lng);
    $markerStmt->bindParam(3,$center_lat);
    $markerStmt->bindParam(4,$radius);
    //Execute query
    $markerStmt->setFetchMode(PDO::FETCH_ASSOC);
    $markerStmt->execute();
    //Default for zero rows
    if ($markerStmt->rowCount()==0) {
        $node = $dom->createElement("marker");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("name", "No Records Found");
        $newnode->setAttribute("lat", $center_lat);
        $newnode->setAttribute("lng", $center_lng);
        $newnode->setAttribute("distance", 0);
                }
    else {
    // Iterate through the rows, adding XML nodes for each
    while($row = $markerStmt->fetch()) {
        $node = $dom->createElement("marker");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("name", $row['name']);
        $newnode->setAttribute("lat", $row['lat']);
        $newnode->setAttribute("lng", $row['lng']);
        $newnode->setAttribute("distance", $row['distance']);
        $newnode->setAttribute("address", $row['address']);
        $newnode->setAttribute("hours", $row['hours']);
        $newnode->setAttribute("phone", $row['phone']);
        }
    }
echo $dom->saveXML();

}


catch(PDOException $e) {
    echo "I'm sorry I'm afraid you can't do that.". $e->getMessage() ;// Remove or modify after testing 
    file_put_contents('PDOErrors.txt',date('[Y-m-d H:i:s]').", mapSelect.php, ". $e->getMessage()."\r\n", FILE_APPEND);  
 }
//Close the connection
$dbh = null; ?>
