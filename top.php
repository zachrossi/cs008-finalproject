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
        print '<title>';
        //Today's Deals
        if ($path_parts['filename'] == "deals") {
            print "PlanetBay - Today's deals | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>";
            print '<meta name="description" content="This shows planet deals today.">';
        }
                   
        //Home Page
        if ($path_parts['filename'] == "index") {
            print 'PlanetBay -  Home | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title>';
            print '<meta name="description" content="This shows a gallery of some of the products PlantBay has.">';
        }
        //About Page
        if ($path_parts['filename'] == "about") {
            print 'PlanetBay -  About | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
            print '<meta name="description" content="This includes the people behind PlanetBay and their mission.">';
        }            
        //Products
        if ($path_parts['filename'] == "products") {
            print 'PlanetBay -  Products | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
            print '<meta name="description" content="This includes product information">';
        }
        //Contest
        if ($path_parts['filename'] == "contest") {
            print 'PlanetBay -  Contest | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
            print '<meta name="description" content="This includes a contest to win a mystery planet">';
        }
        //add
        //Extra if we need
        if ($path_parts['filename'] == "review") {
            print 'PlanetBay -  Review | Zachary Rossi, Tyler Eisenmenger, Josh Deland</title> ';
            print '<meta name="description" content="This includes the page to review a planet">';
        }
        ?>        
        <meta charset="UTF-8">
        <meta name="author" content="Zachary Rossi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/custon.css?version=1.0" type="text/css">
    </head>
<?php
print '<body id="' . $path_parts['filename'] . '">';
?>

