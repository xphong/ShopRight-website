<?php

// Career DB Class: contains all database related functions for career pages
class CareerDB {

    // Get list of all careers
    public static function getCareer() {
        $db = Database::getDB();
        $query = "SELECT * FROM careers";
        $result = $db->query($query);
        $careers = array();
        foreach ($result as $row) {
            $career = new Career($row['jobid'],
                            $row['name'],
                            $row['address'],
                            
                            $row['postalcode'],
                            $row['phone'],
                            $row['email'],
                            $row['resume']);
            $career->setID($row['id']);
            $careers[] = $career;
        }
        return $careers;
    }
    
    // Career by ID
    public static function getCareerByID($career_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM careers WHERE ID = '$career_id'";
        $result = $db->query($query);
        $row = $result->fetch();
            $career = new Career($row['jobid'],
                            $row['name'],
                            $row['address'],
                            
                            $row['postalcode'],
                            $row['phone'],
                            $row['email'],
                            $row['resume']);
        $career->setID($row['id']);
        return $career;
    }

    // Insert Career into the database table
    public static function addCareer($career) {
        // get database connection using database class
        $db = Database::getDB();

        $jobid = $career->getJobID();
        $name = $career->getName();
        $address = $career->getAddress();
        
        $postalcode = $career->getPostalcode();
        $phone = $career->getPhone();
        $email = $career->getEmail();
        $resume = $career->getResume();

        // insert
        if ($stmt = $db->prepare("INSERT INTO careers
                 (jobid, name, address, postalcode, phone, email, resume)
             VALUES
                (:jobid, :name, :address, :postalcode, :phone, :email, :resume)")) {
            $stmt->bindParam(":jobid", $jobid, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            
            $stmt->bindParam(":postalcode", $postalcode, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":resume", $resume, PDO::PARAM_STR);
            $stmt->execute();
            return $db->lastInsertId();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Delete Career
    public static function deleteCareer($career_id) {
        $db = Database::getDB();

        // delete
        if ($stmt = $db->prepare("DELETE FROM careers WHERE id = :id")) {
            $stmt->bindParam(":id", $career_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }
    
    // Update Career
    public static function updateCareer($career, $career_id) {
        // get database connection using database class
        $db = Database::getDB();

        $jobid = $career->getJobID();
        $name = $career->getName();
        $address = $career->getAddress();
       
        $postalcode = $career->getPostalcode();
        $phone = $career->getPhone();
        $email = $career->getEmail();
        $resume = $career->getResume();

        // update
        if ($stmt = $db->prepare("UPDATE careers
                 SET jobid = :jobid, name = :name, address = :address, postalcode = :postalcode, phone = :phone, email = :email, resume = :resume
                 WHERE id = :id")) {
            $stmt->bindParam(":jobid", $jobid, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            
            $stmt->bindParam(":postalcode", $postalcode, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":resume", $resume, PDO::PARAM_STR);
            $stmt->bindParam(":id", $career_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Save Career's Resume
    public static function saveResume($career, $career_id, $file, $admin="") {
        $id = $career->getFormattedID($career_id);
        $path = $admin."resumes/";
        if (!is_dir($path)){
            mkdir($path);
        }
        $path_id = $path.$id;
        if (!is_dir($path_id)){
            mkdir($path_id);
        }
        if ($file['error']!=4){
            move_uploaded_file($file['tmp_name'], $admin."resumes/".$id."/".$career->getResume());
        }
    }
}

?>