<?php

// Search DB Class: contains all database related functions for search pages
class SearchDB {

    // Get list of all search results
    public static function getSearch() {
        $db = Database::getDB();
        $query = "SELECT * FROM search";
        $result = $db->query($query);
        $searches = array();
        foreach ($result as $row) {
            $search = new Search($row['title'],
                                $row['url'],
                            $row['keywords']);
            $search->setId($row['id']);
            $searches[] = $search;
        }
        return $searches;
    }
    
    // Get list of all search results by keyword
    public static function getSearchResults($keyword) {
        $db = Database::getDB();
        $query = "SELECT * FROM search WHERE keywords LIKE '%$keyword%'";
        $result = $db->query($query);
        $searches = array();
        foreach ($result as $row) {
            $search = new Search($row['title'],
                                $row['url'],
                            $row['keywords']);
            $search->setId($row['id']);
            $searches[] = $search;
        }
        return $searches;
    }
    
    // Get search by ID
    public static function getSearchByID($search_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM search WHERE id = '$search_id'";
        $result = $db->query($query);
        $row = $result->fetch();
            $search = new Search($row['title'],
                                $row['url'],
                            $row['keywords']);
        $search->setId($row['id']);
        return $search;
    }

    // Update search
    public static function updateSearch($search, $search_id) {
        // get database connection using database class
        $db = Database::getDB();

        $title = $search->getTitle();
        $url = $search->getURL();
        $keywords = $search->getKeywords();

        // update
        if ($stmt = $db->prepare("UPDATE search
                 SET title = :title, url = :url , keywords = :keywords
                 WHERE id = :id")) {
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":url", $url, PDO::PARAM_STR);
            $stmt->bindParam(":keywords", $keywords, PDO::PARAM_STR);
            $stmt->bindParam(":id", $search_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

}
?>
