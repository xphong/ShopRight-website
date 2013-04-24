<!---------------Search --------------->
<h3>Search Results</h3>
<div id="recipes-search">
    <?php
    $results = "";
            
    echo "<ul>";
    // search for keyword
    if (!empty($keyword)) {
        $search = SearchDB::getSearchResults($keyword);

        foreach ($search as $searchresults) {
            $title = $searchresults->getTitle();
            $url = $searchresults->getURL();

            $results .= "
                    <li>
                    <p>
                    <h4><a href='$url'>$title</a></h4>
                    </p>
                    <hr />
                    </li>
                    ";
        }
        // check if any results found
        if (!empty($searchresults)) {
            // output results
            echo $results;
        } else {
            echo "No results found.";
        }
    }
    // no keyword entered
    else {
        echo "Enter a keyword to search.";
        }
    echo "</ul>";
    ?>
</div>