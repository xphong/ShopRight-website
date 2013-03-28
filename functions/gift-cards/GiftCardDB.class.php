<?php

// Gift Card DB Class: contains all database related functions for gift card pages
class GiftCardDB {

    // Get list of all gift cards
    public static function getGiftCards() {
        $db = Database::getDB();
        $query = 'SELECT * FROM giftcards';
        $result = $db->query($query);
        $giftcards = array();
        foreach ($result as $row) {
            $giftcard = new GiftCard($row['name'],
                            $row['email'],
                            $row['recipient_name'],
                            $row['address'],
                            $row['postalcode'],
                            $row['phone'],
                            $row['message'],
                            $row['amount']);
            $giftcard->setId($row['id']);
            $giftcards[] = $giftcard;
        }
        return $giftcards;
    }

    // Insert gift card into the database table
    public static function addGiftCard($giftcard) {
        // get database connection using database class
        $db = Database::getDB();

        $name = $giftcard->getName();
        $email = $giftcard->getEmail();
        $rname = $giftcard->getRname();
        $address = $giftcard->getAddress();
        $postalcode = $giftcard->getPostalcode();
        $phonenumber = $giftcard->getPhone();
        $message = $giftcard->getMessage();
        $amount = $giftcard->getAmount();

        // insert
        if ($stmt = $db->prepare("INSERT INTO giftcards
                 (name, email, recipient_name, address, postalcode, phone, message, amount)
             VALUES
                (:name, :email, :rname, :address, :postalcode , :phonenumber, :message, :amount)")) {
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":rname", $rname, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            $stmt->bindParam(":postalcode", $postalcode, PDO::PARAM_STR);
            $stmt->bindParam(":phonenumber", $phonenumber, PDO::PARAM_STR);
            $stmt->bindParam(":message", $message, PDO::PARAM_STR);
            $stmt->bindParam(":amount", $amount, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Delete Gift Card
    public static function deleteGiftCard($giftcard_id) {
        $db = Database::getDB();

        // delete
        if ($stmt = $db->prepare("DELETE FROM giftcards WHERE id = :id")) {
            $stmt->bindParam(":id", $giftcard_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Update gift card 
    public static function updateGiftCard($giftcard, $giftcard_id) {
        // get database connection using database class
        $db = Database::getDB();

        $name = $giftcard->getName();
        $email = $giftcard->getEmail();
        $rname = $giftcard->getRname();
        $address = $giftcard->getAddress();
        $postalcode = $giftcard->getPostalcode();
        $phonenumber = $giftcard->getPhone();
        $message = $giftcard->getMessage();
        $amount = $giftcard->getAmount();


        // update
        if ($stmt = $db->prepare("UPDATE giftcards
                 SET name = :name, email = :email, recipient_name = :rname, address = :address, postalcode = :postalcode, phone = :phonenumber, message = :message, amount = :amount
                 WHERE id = :id")) {
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":rname", $rname, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            $stmt->bindParam(":postalcode", $postalcode, PDO::PARAM_STR);
            $stmt->bindParam(":phonenumber", $phonenumber, PDO::PARAM_STR);
            $stmt->bindParam(":message", $message, PDO::PARAM_STR);
            $stmt->bindParam(":amount", $amount, PDO::PARAM_INT);
            $stmt->bindParam(":id", $giftcard_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

}

?>
