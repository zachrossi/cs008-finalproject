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
        ?>        
        <meta charset="UTF-8">
        <meta name="author" content="Zachary Rossi, Tyler Eisenmenger, Josh Deland">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/custon.css?version=1.0" type="text/css">
    </head>
<?php
print '<body id="' . $path_parts['filename'] . '">';
?>

