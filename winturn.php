<?php
include "top.php";
include "nav.php";
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
    return (preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}
?>
<main>
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
                $sql = 'INSERT INTO tblReviews (fldName, fldEmail, fldPlanet, fldRating, fldTitle, fldReview) VALUES (?,?,?,?,?,?)';
                $statement = $pdo->prepare($sql);
                $params = [$name, $email, $planet, $rating, $reviewHeadline, $review];
                $statement->execute($params);
                print '<p>Your review was successfully submitted!</p>';
            } catch (PDOException $e) {
                print '<p>Sorry! Your review was unable to be submitted!</p>';
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
            print "<p>A thank you message was sent to your email.</p>";
        }
        print '<h2>Thank you, your review has been received.</h2>';
        die(); // just stop at this point we dont want to display the form
    }
    ?>
    <link rel="stylesheet" href="css/detailspage.css?version=1.0" type="text/css">


    <h1 class = "planetName">Winturn</h1>

    <h2 class = "price">$189,500,365,000</h2>

    <h2 class = "purchaseButton"><a href="paymentform.php">Purchase Planet</a></h2>

    <figure class = "planetImages">
        <img src="images/planets/winturn.png" alt="This should show the main planet image">
        <!-- Under the main image will be all the images in a row, smaller than the main image -->
    </figure>

    <article>
        <p class = "description">
            Winturn as the name suggests features a really large amount of snow and is always cold. It is know for only having one season,
            winter. It's surface is covered with combination of snow and ice 1 mile thick. Although living on Winturn is very difficult, it
            is a great planet to mine under the snow ice there are untouched resources. Much of that is iron, coal, and gold.
            Would be perfect for an intergalactic mining company. It is also very good for using as a fresh water source. 
            So many opportunities for growth and plenty of money to made off this planet. This planet is also uninhabited so it is like 
            starting on a fresh slate, hard to do in today's society. There are a few hot spots on the planet where volcanoes are located
            which are an easy way to generate electricity. 
        </p>

        <h3>Features of Winturn Planet</h3>
        <ul class = "featureList">
            <li>350 trillion square miles of snow and ice</li>
            <li>Main volcano contains 12,895 million gallons of lava </li>
            <li>Tallest peak - Mount snow - 23.3 km above sea level</li>
            <li>Average temperature is -100 degrees F</li>
            <li>Snow and ice a mile thick</li>
            <li>This planet was used to film the movie, Star Wars: The cold war</li>
        </ul>
    </article>
    <section class="reviews">
        <section class="reviewForm">
            <h2>Write A Review</h2>
            <form action="<?php print $phpThisPage; ?>"
                  id = "frmReview"
                  method="POST">
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
                        <option value='hobbiton'>Hobbiton</option>
                        <option value='jupiter'>Jupiter</option>
                        <option value='jeffbezos'>Jeffbezos</option>
                        <option value='saturn'>Saturn</option>
                        <option value='odysseus'>Odysseus</option>
                        <option value='pluto'>Pluto</option>
                        <option value='winturn'>Winturn</option>
                        <option value='venus'>Venus</option>
                        <option value='nova'>Nova</option>
                    </select>
                </fieldset>
                <input name="btnSubmit" type="submit" value="Submit Review">
            </form>
        </section>
        <section class="displayReviews">
            <h2>All Reviews</h2>
            <?php
            //Will change to to WHERE fldPlanet = 'insert planet here' to use reviews only from that planet
            $sql = 'SELECT fldName, fldRating, fldTitle, fldReview, fldPlanet FROM tblReviews WHERE fldPlanet = "winturn"';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $rows = $statement->fetchAll();
            foreach ($rows as $row){
                print '';
                print '<p class=\'review_rating\'>' . $row['fldRating'] . '</p>';
                print '<p class=\'review_name\'>' . $row['fldName'] . '</p>';
                print '<p class=\'review_title\'>' . $row['fldTitle'] . '</p>';
                print '<p class=\'review_review\'>' . $row['fldReview'] . '</p>';
            }
            ?>
        </section>
    </section>

    <!-- Ratings are at the bottom so the count functions work -->
    <section class="ratings">
        <?php
        $sum = 0;
        foreach ($rows as $row){
            $sum += $row['fldRating'];
        }
        $average = $sum / count($rows);
        print '<h3> Average rating: </h3>';
        print '<h3 class = "ratingStars">' . number_format($average, 2);
        print '<h3> based on </h3>';
        print '<h3 class = "reviewCount">' . count($rows) . ' reviews</h3>'; ?>
    </section>


</main>

<?php include "footer.php" ?>
</body>
</html>
