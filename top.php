<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
$databaseName = 'ZROSSI_finalProject';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$dbUserName = "zrossi_writer";
$dbPassword = "MDdC3cSqx2PJbgbF";  // as listed in the original email when you create your account
print '<!-- Make DB connection -->';
$pdo = new PDO($dsn, $dbUserName, $dbPassword);
?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <?php
    //Today's Deals
    if ($path_parts['filename'] == "deals") {
        print '<title> PlanetBay - Today\'s deals | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
        print '<meta name="description" content="This shows planet deals today.">';
    }
    //Home Page
    if ($path_parts['filename'] == "index") {
        print '<title> PlanetBay -  Home | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
        print '<meta name="description" content="This shows a gallery of some of the products PlantBay has.">';
    }
    //About Page
    if ($path_parts['filename'] == "about") {
        print '<title> PlanetBay -  About | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>' ;
        print '<meta name="description" content="This includes the people behind PlanetBay and their mission.">';
    }
    //Products
    if ($path_parts['filename'] == "allplanets") {
        print '<title> PlanetBay - Shop All Planets | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
        print '<meta name="description" content="View all purchasable planets here.">';
    }
    //Contest
    if ($path_parts['filename'] == "contest") {
        print '<title> PlanetBay -  Contest | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
        print '<meta name="description" content="This includes a contest to win a mystery planet">';
    }


    //Planets
    if ($path_parts['filename'] == "jupiter") {
        print '<title> PlanetBay - Jupiter | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
        print '<meta name="description" content="Purchase Jupiter here.">';
    }
    if ($path_parts['filename'] == "saturn") {
        print '<title> PlanetBay - Saturn | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
        print '<meta name="description" content="Purchase Saturn here.">';
    }
    if ($path_parts['filename'] == "pluto") {
        print '<title> PlanetBay - Pluto | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
        print '<meta name="description" content="Purchase Pluto here.">';
    }
    if ($path_parts['filename'] == "venus") {
        print '<title> PlanetBay - Venus | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
        print '<meta name="description" content="Purchase Venus here.">';
    }
    ?>

    <meta charset="UTF-8">
    <meta name="author" content="Zachary Rossi, Tyler Eisenmenger, Josh Deland">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css?version=1.0" type="text/css">
    <link rel="site icon" href="images/misc/planeticon.png">
</head>
<?php
print '<body id="' . $path_parts['filename'] . '">';
?>
