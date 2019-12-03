<header>
    <h1>Planet Bay</h1>
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

            //Today's Deals
            print '<li class="';
            if ($path_parts['filename'] == "deals") {
                print 'activePage';
            }
            print '">';
            print '<a href="form.php">Today\'s Deals</a>';
            print '</li>';

            //Products
            print '<li class="';
            if ($path_parts['filename'] == "allplanets") {
                print 'activePage';
            }
            print '">';
            print '<a href="allplanets.php">Shop Planets</a>';
            print '</li>';
            
            //Contest
            print '<li class="';
            if ($path_parts['filename'] == "contest") {
                print 'activePage';
            }
            print '">';
            print '<a href="contest.php">Contest</a>';
            print '</li>';
            
            
            //About
            print '<li class="';
            if ($path_parts['filename'] == "about") {
                print 'activePage';
            }
            print '">';
            print '<a href="about_us.php">About</a>';
            print '</li>';
            ?>
            
            
        </ul>
    </nav>
