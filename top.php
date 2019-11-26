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
    if ($path_parts['filename'] == "products") {
        print '<title> PlanetBay -  Products | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
        print '<meta name="description" content="This includes product information">';
    }
    //Contest
    if ($path_parts['filename'] == "contest") {
        print '<title> PlanetBay -  Contest | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
        print '<meta name="description" content="This includes a contest to win a mystery planet">';
    }
    //add
    //Extra if we need
    //review
    if ($path_parts['filename'] == "review") {
      print 'PlanetBay -  Review | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
      print '<meta name="description" content="This includes the page to review a planet">';
    ?>
    <meta charset="UTF-8">
    <meta name="author" content="Zachary Rossi, Tyler Eisenmenger, Josh Deland">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/custom.css?version=1.0" type="text/css">
</head>
<?php
print '<body id="' . $path_parts['filename'] . '">';
?>
