<header class='logo'>
    <img src='images/logo_small.png'>
</header>
<nav>
        <ul>
            <?php
            //Home Page
            print '<li class="';
            if ($path_parts['filename'] == "index") {
                print 'activePage';
            }
            print '">';
            print '<a href="index.php">Home</a>';
            print '</li>';
            
            //Products
            print '<li class="';
            if ($path_parts['filename'] == "allplanets") {
                print 'activePage';
            }
            print '">';
            print '<a href="allplanets.php">Shop Planets</a>';
            print '</li>';
                      
            //About
            print '<li class="';
            if ($path_parts['filename'] == "about") {
                print 'activePage';
            }
            print '">';
            print '<a href="about.php">About</a>';
            print '</li>';
            ?>
            
            
        </ul>
    </nav>
