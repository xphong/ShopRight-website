<!--------------Navigation--------------->
<div class="header-wrapper">
    <nav>
        <ul class="menu">
            <li><a href="index.php" title="Flyer">Home</a></li>
            <li><a href="flyer-admin.php" title="Flyer">Flyer</a></li>
            <li><a href="locator-admin.php" title="Store Locator">Store Locator</a></li>
            <li><a href="recipes-admin.php" title="Recipes">Recipes</a></li>
            <li><a href="events-admin.php" title="Events">Events</a></li>
            <li><a href="about-admin.php" title="About"> About</a></li>
        </ul>
        <!-- /menu -->
        <div class="minimenu">
            <div>MENU</div>
            <select onchange="location=this.value">
                <option value="index.php">Home</option>
                <option value="flyer-admin.php">Flyer</option>
                <option value="locator-admin.php">Store Locator</option>
                <option value="recipes-admin.php">Recipes</option>
                <option value="events-admin.php">Events</option>
                <option value="about-admin.php">About</option>
            </select>
        </div>
        <!-- /mobile menu --> 
    </nav>
               <div class="user-identity">        
    <?php if (isset($_SESSION['role']) && isset($_SESSION['username'])): ?>
        Welcome, <?php echo $_SESSION['username']; ?> <a href="logout.php">Logout</a>
    <?php endif; ?>
    </div>
</div>
<!--------------/Navigation---------------> 