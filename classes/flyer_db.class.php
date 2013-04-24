<?php

// Flyer DB Class: contains all database related functions for flyer pages
class FlyerDB {

    // Get list of all flyers
    public static function getFlyer() {
        $db = Database::getDB();
        $query = "SELECT * FROM flyers";
        $result = $db->query($query);
        $flyers = array();
        foreach ($result as $row) {
            $flyer = new Flyer($row['flyerdate'],
                            $row['page1']);
            $flyer->setID($row['id']);
            $flyers[] = $flyer;
        }
        return $flyers;
    }
    
    // Flyer by ID
    public static function getFlyerByID($flyer_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM flyers WHERE ID = '$flyer_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        $flyer = new Flyer($row['flyerdate'],
                        $row['page1']);
        $flyer->setID($row['id']);
        return $flyer;
    }

    // Insert Flyer into the database table
    public static function addFlyer($flyer) {
        // get database connection using database class
        $db = Database::getDB();

        $flyerdate = $flyer->getFlyerDate();
        $page1 = $flyer->getPage1();

        // insert
        if ($stmt = $db->prepare("INSERT INTO flyers
                 (flyerdate, page1)
             VALUES
                (:flyerdate, :page1)")) {
            $stmt->bindParam(":flyerdate", $flyerdate, PDO::PARAM_STR);
            $stmt->bindParam(":page1", $page1, PDO::PARAM_STR);
            $stmt->execute();
            return $db->lastInsertId();// return the last inserted id to the table
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Delete Flyer
    public static function deleteFlyer($flyer_id) {
        $db = Database::getDB();

        // delete
        if ($stmt = $db->prepare("DELETE FROM flyers WHERE id = :id")) {
            $stmt->bindParam(":id", $flyer_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
//file is uploaded to to a directory so it needs to be deleted
        $dir = "../images/".Flyer::getFormattedID($flyer_id);
        FlyerDB::deleteDirectory($dir);
    }
    //function to delete directory and all content where the image file was placed
    //scandir — List files and directories inside the specified path
    public static function deleteDirectory($dir){
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            unlink($dir.DIRECTORY_SEPARATOR.$item);//DIRECTORY_SEPARATOR ia a predefined constant
        }
        return rmdir($dir);//rmdir rmoves directory
    }

    // Update Flyer
    public static function updateFlyer($flyer, $flyer_id) {
        // get database connection using database class
        $db = Database::getDB();

        $flyerdate = $flyer->getFlyerDate();
        $page1 = $flyer->getPage1();

        // update
        if ($stmt = $db->prepare("UPDATE flyers
                 SET flyerdate = :flyerdate, page1 = :page1
                 WHERE id = :id")) {
            $stmt->bindParam(":flyerdate", $flyerdate, PDO::PARAM_STR);
            $stmt->bindParam(":page1", $page1, PDO::PARAM_STR);
            $stmt->bindParam(":id", $flyer_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Save Flyer's Image
    public static function saveImage($flyer, $flyer_id, $file) {
        $id = $flyer->getFormattedID($flyer_id);
        $path = "../images/";
        if (!is_dir($path)){
            mkdir($path);
        }
        $path_id = $path.$id;
        if (!is_dir($path_id)){
            mkdir($path_id);
        }
        if ($file['error']!=4){
            move_uploaded_file($file['tmp_name'], "../images/".$id."/".$flyer->getPage1());
        }
    }
}

?>