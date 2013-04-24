<?php
require('../classes/database.class.php');
require('../classes/search.class.php');
require('../classes/search_db.class.php');

// page title
$title = "ShopRight Admin - Search";

// track user session
$user = "admin";

ob_start(); //output buffer

include('../includes/header-admin.php');
include('../includes/nav-admin.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_search';
}

?>

<section id="content">
    <div id="single-content">
        <?php
        // list search table
        if ($action == 'list_search') {
            $search = SearchDB::getSearch();

            // Display the search list
            include('../includes/search/search-list.php');
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the search ID
            $search_id = $_POST['search_id'];

            // gets info
            $search = SearchDB::getSearchByID($search_id);
            include('../includes/search/search-update.php');
        } else if ($action == 'update_search') {
            // Get the search ID
            $search_id = $_POST['search_id'];
            
            // retrieve from form
            $title = $_POST["title"];
            $url = $_POST["url"];
            $keywords = $_POST["keywords"];


            // validation
            if ((isset($title) && !empty($title)) && (isset($url) && !empty($url)) && (isset($keywords) && !empty($keywords))) {
                // if there are no validation errors, update table
                    $search = new Search($title, $url, $keywords);
                    SearchDB::updateSearch($search, $search_id);
                    header("Location: search-admin.php?msg=Updated");
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />
                        ";
            }
        }
        ob_end_flush();
        ?>
    </div>
    <!-- /single-content -->

    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 



<?php include('../includes/footer-admin.php'); ?>
<!-- /footer -->
