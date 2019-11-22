<?php
    include "top.php";
    include "nav.php";
?>
    <link rel="stylesheet" href="css/detailspage.css?version=1.0" type="text/css">
<main>

    <h1 class = "planetName">Planet Name</h1>

    <section class="ratings">
    <h3 class = "ratingStars">☆☆☆☆☆</h3>
    <h3 class = "reviewCount">45 Reviews</h3>
    </section>

    <h2 class = "price">$1,240,000</h2>

    <h2 class = "purchaseButton"><a href="paymentinfo.php">Purchase Planet</a></h2>

    <figure class = "planetImages">
        <img src="finalProjectImages/genericplanet.jpg" alt="This should show the main planet image">
        <!-- Under the main image will be all the images in a row, smaller than the main image -->
    </figure>

    <article>
    <p class = "description">This is where the planet will be described in great detail.
    We can also add a list of the main features if we want, and maybe some other info. (Example description)
    Planet X exudes an overwhelming feeling of life and vibrance. One of its most unique features
    is the diversity of color as seen from space. Hues of yellow, purple, blue, and green pierce through
    the atmosphere and into our blessed eyes. On the surface you will find deep valleys and tall peaks which
    are complimented by a large lagoon in the eastern hemisphere and an expansive desert in the west. Underground
    is a big cave with more caves in the first cave! Please buy this planet the price is very, very low!</p>

    <h3>Features of Planet X</h3>
    <ul class = "featureList">
        <li>3.5 million sq. ft. of desert with fine sand</li>
        <li>Main lagoon contains 12,895 million gallons of saltwater </li>
        <li>Tallest peak - 45.3 km above sea level</li>
        <li>Feature</li>
        <li>Feature</li>
        <li>Feature</li>
    </ul>
    </article>

    <section class="reviewForm">
        <h2>Write A Review</h2>
        <form action="<?php print $phpself; ?>"
              id = "frmReview"
              method="POST">


        </form>

    </section>

</main>

<?php include "footer.php" ?>
