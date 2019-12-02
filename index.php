<!DOCTYPE html>
<!--
Index.php
Home Page

maybe add:
-search bar
-gallery
-->
<?php
include ("top.php");
include ("nav.php");
?>
<main>
    <article>
        <h1>PlanetBay</h1>
        <!--Figure 1-->
        <section class="section_one">
            <figure>
                <img src="images/planets/planet1.png" alt="Image of planet 1">
                <figcaption>Planet 1</figcaption>
            </figure>
        </section>
        <!--Figure 2-->
        <section class="section_two">
            <figure>
                <img src="images/planets/planet2.jpg" alt="Image of planet 2">
                <figcaption>Planet 2</figcaption>
            </figure>
        </section>
        <!--Figure 3-->
        <section class="section_three">
            <figure>
                <img src="images/planets/planet3.jpg" alt="Image of planet 3">
                <figcaption>planet 3</figcaption>
            </figure>
        </section>
        <!--Figure 4-->
        <section class="section_four">
            <figure>
                <img src="images/planets/planet4.jpg" alt="Image of planet 4">
                <figcaption>planet 4</figcaption>
            </figure>
        </section>
    </article>
    <?php
    include ("footer.php");
    ?>
</main>

