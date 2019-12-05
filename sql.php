<?php
include ("top.php");
include ("nav.php");
?>
<main>
    <article>
        <h1>SQL CODE</h1>
        <h2>Payment Table</h2>
        <code>
            CREATE TABLE tblPayment (
            pnkUserID INT(11) AUTO_INCREMENT,
            txtFirstName VARCHAR(30),
            txtLastName VARCHAR(40),
            txtEmail VARCHAR(50),
            txtPhoneNumber VARCHAR(16),
            txtMailAddress VARCHAR(40),
            txtCity VARCHAR(30),
            txtState VARCHAR(20),
            txtZipCode INT(5),
            selPlanet VARCHAR(40),
            fldCardType VARCHAR(16),
            txtCardName VARCHAR(40),
            txtCardNumber INT(16),
            txtCardCVC INT(4),
            fldExpirationMonth VARCHAR(9),
            fldEXpirationYear INT(4),
            chkEmail VARCHAR(2),
            chkText VARCHAR(2),
            chkPhone VARCHAR(2)
            );
        </code>
        <h2>Reviews Table</h2>
        <code>
            CREATE TABLE tblReviews (
            pmkCount INT(11) AUTO_INCREMENT,
            fldName VARCHAR(50),
            fldEmail VARCHAR(50),
            fldPlanet VARCHAR(50),
            fldRating INT(1),
            fldTitle VARCHAR(50),
            fldReview VARCHAR(10000)
            );
        </code>
        <h2>Inserting into the reviews table</h2>
        <code>
            INSERT INTO tblReviews (fldName, fldEmail, fldPlanet, fldRating, fldTitle, fldReview) VALUES (?,?,?,?,?,?)   
        </code>
        <h2>Inserting into the payment table</h2>
        <code>
            INSERT INTO tblPayment (txtFirstName, txtLastName, txtEmail, txtPhoneNumber, txtMailAddress, txtCity, txtState, txtZipCode, selPlanet, fldCardType, txtCardName, txtCardNumber, txtCardCVC, fldExpirationMonth, fldExpirationYear, chkEmail, chkText, chkPhone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)   
        </code>
        <h2>Show the review on the website</h2>
        <code>
            SELECT fldName, fldRating, fldTitle, fldReview, fldPlanet FROM tblReviews WHERE fldPlanet = "(planet on the webpage)"
        </code>
    </article>
</main>
<?php
    include("footer.php")
?>
    </body>
</html>

