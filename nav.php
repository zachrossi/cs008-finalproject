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
            print '<a href="form.php">Todays Deals</a>';
            print '</li>';

            //About
            print '<li class="';
            if ($path_parts['filename'] == "about") {
                print 'activePage';
            }
            print '">';
            print '<a href="about_us.php">About</a>';
            print '</li>';

            //Products
            print '<li class="';
            if ($path_parts['filename'] == "products") {
                print 'activePage';
            }
            print '">';
            print '<a href="contact.php">Contact</a>';
            print '</li>';
            
            //Contest
            print '<li class="';
            if ($path_parts['filename'] == "contest") {
                print 'activePage';
            }
            print '">';
            print '<a href="contest.php">Contest</a>';
            print '</li>';
            ?>
        </ul>
    </nav>