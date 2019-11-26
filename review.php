        <?php
        include ("top.php");
        include ("nav.php");
        print '<p>Post Array:</p><pre>';
        print_r($_POST);
        print '</pre>';
        
        $dataIsGood = false;

        //
        // Sanatize the data
        //
        function getData($field) {
            if (!isset($_POST[$field])) {
                $data = "";
            } else {
                $data = trim($_POST[$field]);
                $data = htmlspecialchars($data);
            }
            return $data;
            }
        function verifyAlphaNum($testString) {
            return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
            }
        ?>
        <main>
            <h1>PlanetBay</h1>
            <article>
                <?php
        // process form when it is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // we only save the data if it is good so we need to make a flag
            // notice if the data fails a check i set this flag to false
            $dataIsGood = true;

            // Server side Sanatize values
            $name = getData("txtName");            
            $rating = getData("selRating");
            $reviewHeadline = getData("txtReviewHeadline");
            $review = getData("txtReview");
            $planet = getData("selPlanet");
            $email = getData("txtEmail");
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            //MAKE A BUNCH OF IF STATEMENTS
            // Server side Validation
            
            
            if ($name == "") {
                print '<p class="mistake">Please enter your name.</p>';
                $dataIsGood = false;
            }
            if (verifyAlphaNum($name) == 0) {
                print '<p class="mistake">Please enter a valid name.</p>';
                $dataIsGood = false;
            }
            if ($reviewHeadline == "") {
                print '<p class="mistake">Please enter your review headline.</p>';
                $dataIsGood = false;
            }
            if ($review == "") {
                print '<p class="mistake">Please enter your review.</p>';
                $dataIsGood = false;
            }
            if ($rating > 5 or $rating < 1) {
                print '<p class="mistake">Please choose a proper rating value.</p>';
                $dataIsGood = false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // filter var returns true if it is valid, the ! says if it is not good
                print '<p class="mistake">Your email address appears to be incorrect.</p>';
                $dataIsGood = false;
            }
            if ($email == "") {
                print '<p class="mistake">Please enter your email address.</p>';
                $dataIsGood = false;
            }
           
            if ($dataIsGood) {
                // save the data
                try {
                    // Try to insert the submitted values using a prepared statement
                    $sql = 'INSERT INTO tblReviews (fldName, fldRating, fldTitle, fldReview, fldPlanet) VALUES (?,?,?,?,?)';
                    $statement = $pdo->prepare($sql);
                    $params = [$name, $rating, $reviewHeadline, $review, $planet];
                    $statement->execute($params);
                    print '<p>record was successfully inserted.</p>';
                } catch (PDOException $e) {
                    print '<p>Couldn\'t insert the record please contact someone :) and ignore the email.</p>';
                } //end try
            } // ends data is good
        } // ends form was submitted
        
        // if the data is good we will email the person and display a message, 
        // otherwise we display the form
        if ($dataIsGood) {
            $to = $email;
            $from = 'PlanetBay Team <zrossi@uvm.edu>';
            $subject = 'PlanetBay Review Completion';
            $mailMessage = '<p style="font: 14pt serif;">Very cool of you to review a planet.</p><p>Very cool<br><span style="color: blue; padding-left: 5em;">PlanetBays</span></p>';
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "From: " . $from . "\r\n";


            $mailedSent = mail($to, $subject, $mailMessage, $headers);

            if ($mailedSent) {
                print "<p>Mail send successfully</p>";
            }
            
            print '<h2>Thank you, your information has been received.</h2>';
            
            die(); // just stop at this point we dont want to display the form
        }
                ?>
                <h2>Form</h2>
                <form action="#" method="POST">
                    <fieldset>
                        <legend>Enter your Name and Email</legend>
                        <p><label for="txtName">Name:</label>
                            <input name="txtName" id="txtName" type="text" required></p>
                        <p><label for="txtEmail">Email:</label>
                            <input name="txtEmail" id="txtEmail" type="text" required></p>
                    </fieldset>
                    <fieldset>
                        <legend>Enter your review</legend>
                        <p><label for="txtReviewHeadline">Review Title:</label>
                            <input name="txtReviewHeadline" id="txtReviewHeadline" type="text" required></p>
                        <p><label for="txtReview">Review:</label>
                            <textarea name="txtReview" id="txtReview" rows="7" cols="50"></textarea></p>
                    </fieldset>
                    <fieldset>
                        <legend>Select your rating</legend>
                        <select name="selRating" id="selRating" required>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <legend>Select the planet the review is for</legend>
                        <select name="selPlanet" id="selPlanet" required>
                            <option value='planet1'>planet1</option>
                            <option value='planet2'>planet2</option>
                            <option value='planet3'>planet3</option>
                            <option value='planet4'>planet4</option>
                            <option value='planet5'>planet5</option>
                        </select>
                    </fieldset>  
                    <input name="btnSubmit" type="submit" value="submit">
                </form>
            </article>
        </main>
        <?php
        include ("footer.php");
        ?>
    </body>
</html>
