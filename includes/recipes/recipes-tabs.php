<div id="tabs">
    <ul>
        <li><a href="#tab-breakfast">Breakfast</a></li>
        <li><a href="#tab-lunch">Lunch</a></li>
        <li><a href="#tab-dinner">Dinner</a></li>
    </ul>
    <div id="tab-breakfast">
        <?php include('recipes-breakfast.php'); ?>
    </div>
    <div id="tab-lunch">
        <?php include('recipes-lunch.php'); ?>
    </div>
    <div id="tab-dinner">
        <?php include('recipes-dinner.php'); ?>
    </div>
</div>
<!--/Recipe Tabs-->

<!--Tabs Function-->
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>
