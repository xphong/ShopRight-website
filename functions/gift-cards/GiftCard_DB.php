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

        $query =
                "INSERT INTO giftcards
                 (name, email, recipient_name, address, postalcode, phone, message, amount)
             VALUES
                 ('$name', '$email', '$rname', '$address', '$postalcode', '$phonenumber', '$message', '$amount')";

        $row_count = $db->exec($query);
    }

}

?>
