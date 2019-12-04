<?php
include "top.php";
include "nav.php";
$dataIsGood = false;
function getData($field) {
    if(!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}
?>
    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dataIsGood = true;
            $firstName = getData("txtFirstName");
            $lastName = getData("txtLastName");
            $email = getData("txtEmail");
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $phoneNumber = getData("txtPhoneNumber");
            $mailAddress = getData("txtMailAddress");
            $city = getData("txtCity");
            $state = getData("txtState");
            $zipCode = getData("txtZipCode");
            $planet = getData("selPlanetPayment");
            $cardType = getData("cardType");
            $cardName = getData("txtCardName");
            $cardNumber = getData("txtCardNumber");
            $cardCVC = getData("txtCardCVC");
            $expirationMonth = getData("selExpirationMonth");
            $expirationYear = getData("selExpirationYear");
            $emailCheckbox = getData("chkEmail");
            $textCheckbox = getData("chkText");
            $phoneCheckbox = getData("chkPhone");

            if($firstName == "") {
                print "<p class='mistake'>Please enter your first name.</p>";
                $dataIsGood = false; }

            if($lastName == "") {
                print "<p class='mistake'>Please enter your last name.</p>";
                $dataIsGood = false; }

            if($email == "") {
                print "<p class='mistake'>Please enter your email address.</p>";
                $dataIsGood = false; }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                print "<p class='mistake'>The email address you entered is invalid.</p>";
                $dataIsGood = false; }

            if($firstName == "") {
                print "<p class='mistake'>Please enter your name.</p>";
                $dataIsGood = false; }

            if($phoneNumber == "") {
                print "<p class='mistake'>Please enter your phone number.</p>";
                $dataIsGood = false; }
            elseif(!preg_match('/^\d{10}$/', $phoneNumber)) {
                print "<p class='mistake'>The phone number you entered is invalid.</p>";
                $dataIsGood = false; }

            if($mailAddress == "") {
                print "<p class='mistake'>Please enter your mailing address.</p>";
                $dataIsGood = false; }

            if($city == "") {
                print "<p class='mistake'>Please enter the city of your mailing address.</p>";
                $dataIsGood = false; }

            if($state == "") {
                print "<p class='mistake'>Please enter the state of your mailing address.</p>";
                $dataIsGood = false; }

            if($zipCode == "") {
                print "<p class='mistake'>Please enter your zip code.</p>";
                $dataIsGood = false; }
            elseif(!ctype_digit($zipCode)) {
                print "<p class='mistake'>The zip code you entered is invalid.</p>";
                $dataIsGood = false; }
            elseif(!preg_match('/^\d{5}$/', $zipCode)) {
                print "<p class='mistake'>The zip code you entered is invalid.</p>";
                $dataIsGood = false; }

            if($planet == "") {
                print "<p class='mistake'>Please select the planet you want to purchase.</p>";
                $dataIsGood = false; }

            if($cardType == "") {
                print "<p class='mistake'>Please select a payment card type.</p>";
                $dataIsGood = false; }

            if($cardName == "") {
                print "<p class='mistake'>Please enter the name that appears on your card.</p>";
                $dataIsGood = false; }

            if($cardNumber == "") {
                print "<p class='mistake'>Please enter your card number.</p>";
                $dataIsGood = false; }
            elseif(!preg_match('/^\d{16}$/', $cardNumber)) {
                print "<p class='mistake'>The card number you entered is invalid. It should be 16 digits long.</p>";
                $dataIsGood = false; }

            if($cardCVC == "") {
                print "<p class='mistake'>Please enter your card CVC number.</p>";
                $dataIsGood = false; }
            elseif(!preg_match('/^\d{4}$/' or '/^\d{3}$/', $cardNumber)) {
                print "<p class='mistake'>The CVC you entered is invalid. It should be 3 or 4 digits long.</p>";
                $dataIsGood = false; }

            if($expirationMonth == "") {
                print "<p class='mistake'>Please select the month your card expires.</p>";
                $dataIsGood = false; }

            if($expirationYear == "") {
                print "<p class='mistake'>Please select the year your card expires.</p>";
                $dataIsGood = false; }
            elseif($expirationYear < 2019 or $expirationYear > 2032) {
                print "<p class='mistake'>Select the year your card expires. It must be between 2019 and 2032.</p>";
                $dataIsGood = false; }

            //MORE VALIDATION IF STATEMENTS GO HERE//
            //CONNECTION TO DATABASE:
            if($dataIsGood){
                try{
                    $sql="INSERT INTO tblPayment (txtFirstName, txtLastName, txtEmail, txtPhoneNumber, txtMailAddress, txtCity, txtState, txtZipCode, selPlanet, fldCardType, txtCardName, txtCardNumber, txtCardCVC, fldExpirationMonth, fldExpirationYear, chkEmail, chkText, chkPhone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $statement = $pdo->prepare($sql);
                    $params = [$firstName, $lastName, $email, $phoneNumber, $mailAddress, $city, $state, $zipCode,
                        $planet, $cardType, $cardName, $cardNumber, $cardCVC, $expirationMonth, $expirationYear,
                        $emailCheckbox, $textCheckbox, $phoneCheckbox];
                    $statement->execute($params);
                    print"<p>Data has been successfully inserted.</p>";
                }
                catch (PDOException $e) {
                    print "<p>Data was unable to be submitted.</p>";
                }
            }
            print "<p>Your contact and donation info was received. Thank you for your contribution!</p>";
            die();
        }
        ?>
        <h2>Enter the following information to complete your purchase.</h2>
        <form action="<?php print $phpSelf; ?>"
              id = "frmDonate"
              method="POST">
            <fieldset class="personalInfo">
                <legend>Enter your personal information:</legend>
                <p><label for="txtFirstName">First name:</label>
                    <input type="text" name="txtFirstName" id="txtFirstName" required></p>
                <p><label for="txtLastName">Last name:</label>
                    <input type="text" name="txtLastName" id="txtLastName" required></p>
                <p><label for="txtEmail">Email address:</label>
                    <input type="text" name="txtEmail" id="txtEmail" required></p>
                <p><label for="txtPhoneNumber">Phone number:</label>
                    <input type="text" name="txtPhoneNumber" id="txtPhoneNumber" required></p>
                <p><label for="txtMailAddress">Mailing address:</label>
                    <input type="text" name="txtMailAddress" id="txtMailAddress" required></p>
                <p><label for="txtCity">City:</label>
                    <input type="text" name="txtCity" id="txtCity" required></p>
                <p><label for="txtState">State:</label>
                    <Input type="text" name="txtState" id="txtState" required></p>
                <p><label for="txtZipCode">Zip code:</label>
                    <input type="text" name="txtZipCode" id="txtZipCode" required></p>
            </fieldset>
            <fieldset>
                <legend>What planet are you purchasing?</legend>
                <select name="selPlanetPayment" id="selPlanetPayment" required>
                    <option value='fakeplanet1'>Fake Planet 1</option>
                    <option value='jupiter'>Jupiter</option>
                    <option value='fakeplanet2'>Fake Planet 2</option>
                    <option value='saturn'>Saturn</option>
                    <option value='fakeplanet3'>Fake Planet 3</option>
                    <option value='pluto'>Pluto</option>
                    <option value='fakeplanet4'>Fake Planet 4</option>
                    <option value='venus'>Venus</option>
                    <option value='fakeplanet5'>Fake Planet 5</option>
                </select>
            </fieldset>
            <fieldset class="paymentInfo">
                <legend>Enter your payment information:</legend>
                <fieldset class="cardType">
                    <legend>Select the credit card you are using.</legend>
                    <p><input type="radio" name="cardType" value="Visa" id="radVisa">
                        <label for="radVisa"><img src="images/payment/visa.png"></label> </p>
                    <p><input type="radio" name="cardType" value="Mastercard" id="radMastercard">
                        <label for="radMastercard"><img src="images/payment/mastercard.png"></label></p>
                    <p><input type="radio" name="cardType" value="Discover" id="radDiscover">
                        <label for="radDiscover"><img src="images/payment/discover.png"></label></p>
                    <p><input type="radio" name="cardType" value="American Express" id="radAmericanExpress">
                        <label for="radAmericanExpress"><img src="images/payment/americanexpress.png"></label></p>
                </fieldset>
                <fieldset class="cardInfo">
                    <legend>Enter your credit card information.</legend>
                    <p><label for="txtCardName">Name on card:</label>
                        <input type="text" name="txtCardName" id="txtCardName" required></p>
                    <p><label for="txtCardNumber">Card number:</label>
                        <input type="text" name="txtCardNumber" id="txtCardNumber" required></p>
                    <p><label for="txtCardCVC">CVC/CVV (3 or 4 digit number on back of card):</label>
                        <input type="text" name="txtCardCVC" id="txtCardCVC" required></p>
                    <p class="cardExpirationDate">
                        Expiration date (month/year):
                        <select name="selExpirationMonth" id="selExpirationMonth" required>
                            <option value='January'>1</option>
                            <option value='February'>2</option>
                            <option value='March'>3</option>
                            <option value='April'>4</option>
                            <option value='May'>5</option>
                            <option value='June'>6</option>
                            <option value='July'>7</option>
                            <option value='August'>8</option>
                            <option value='September'>9</option>
                            <option value='October'>10</option>
                            <option value='November'>11</option>
                            <option value='December'>12</option>
                        </select>
                        <select name="selExpirationYear" id="selExpirationYear" required>
                            <option value='2019'>2019</option>
                            <option value='2020'>2020</option>
                            <option value='2021'>2021</option>
                            <option value='2022'>2022</option>
                            <option value='2023'>2023</option>
                            <option value='2024'>2024</option>
                            <option value='2025'>2025</option>
                            <option value='2026'>2026</option>
                            <option value='2027'>2027</option>
                            <option value='2028'>2028</option>
                            <option value='2029'>2029</option>
                            <option value='2030'>2030</option>
                            <option value='2031'>2031</option>
                            <option value='2032'>2032</option>
                        </select>
                    </p>
                </fieldset>
            </fieldset>
            <fieldset class="updates">
                <legend>Select how you would like to recieve updates (optional).</legend>
                <p><input type="checkbox" id="chkEmail" name="chkEmail">
                    <label for="chkEmail">Email</label></p>
                <p><input type="checkbox" id="chkText" name="chkText">
                    <label for="chkText">Text</label></p>
                <p><input type="checkbox" id="chkPhone" name="chkPhone">
                    <label for="chkPhone">Phone</label></p>
            </fieldset>
            <input name="btnSubmitPurchase" type="submit" value="Complete Purchase">

    </main>

<?php include "footer.php" ?>
