<?php

// Store Locator DB Class: contains all database related functions for store locator pages
class StoreLocatorDB {

    // Get list of all store locations
    public static function getStoreLocator() {
        $db = Database::getDB();
        $query = "SELECT * FROM markers";
        $result = $db->query($query);
        $storelocators = array();
        foreach ($result as $row) {
            $storelocator = new StoreLocator($row['name'],
                            $row['address'],
                            $row['lat'],
                            $row['lng'],
                            $row['hours'],
                            $row['Phone']);
                            $storelocator->setID($row['id']);
            $storelocators[] = $storelocator;
        }
        return $storelocators;
    }
    
    // Store Locator  by ID
    public static function getStoreLocatorByID($storelocator_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM markers WHERE ID = '$storelocator_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        $storelocator = new StoreLocator($row['name'],
                        $row['address'],
                        $row['lat'],
                        $row['lng'],
                        $row['hours'],
                        $row['Phone']);
        $storelocator->setID($row['id']);
        return $storelocator;
    }

    // Insert Store Location into the database table
    public static function addStoreLocator($storelocator) {
        // get database connection using database class
        $db = Database::getDB();

        $name = $storelocator->getName();
        $address = $storelocator->getAddress();
        $lat = $storelocator->getLatitude();
        $lng = $storelocator->getLongitude();
        $hours = $storelocator->getHours();
        $phone = $storelocator->getPhone();

        // insert
        if ($stmt = $db->prepare("INSERT INTO markers
                 (name, address, lat, lng, hours, Phone)
             VALUES
                (:name, :address, :lat , :lng, :hours, :phone)")) {
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            $stmt->bindParam(":lat", $lat, PDO::PARAM_STR);
            $stmt->bindParam(":lng", $lng, PDO::PARAM_STR);
            $stmt->bindParam(":hours", $hours, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Delete Store Location
    public static function deleteStoreLocator($storelocator_id) {
        $db = Database::getDB();

        // delete
        if ($stmt = $db->prepare("DELETE FROM markers WHERE id = :id")) {
            $stmt->bindParam(":id", $storelocator_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
   
        
    }

    // Update Store Location 
    public static function updateStoreLocator($storelocator, $storelocator_id) {
        // get database connection using database class
        $db = Database::getDB();

        $name = $storelocator->getName();
        $address = $storelocator->getAddress();
        $lat = $storelocator->getLatitude();
        $lng = $storelocator->getLongitude();
        $hours = $storelocator->getHours();
        $phone = $storelocator->getPhone();


        // update
        if ($stmt = $db->prepare("UPDATE markers
                 SET name = :name, address = :address, lat = :lat, lng = :lng, hours = :hours, Phone = :phone
                 WHERE id = :id")) {
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            $stmt->bindParam(":lat", $lat, PDO::PARAM_STR);
            $stmt->bindParam(":lng", $lng, PDO::PARAM_STR);
            $stmt->bindParam(":hours", $hours, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
            $stmt->bindParam(":id", $storelocator_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

}

?>