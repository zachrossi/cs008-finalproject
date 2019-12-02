<?php
    include "top.php";
    include "nav.php";
    ?>
<main>
    <h2>Enter the following information to complete your purchase.</h2>
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
            <option value='planet1'>planet1</option>
            <option value='planet2'>planet2</option>
            <option value='planet3'>planet3</option>
            <option value='planet4'>planet4</option>
            <option value='planet5'>planet5</option>
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
    <input name="btnSubmitPurchase" type="submit" value="Complete Purchase">

</main>

<?php include "footer.php" ?>
