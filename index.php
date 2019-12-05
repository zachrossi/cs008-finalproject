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
                <img src="images/planets/hobbiton.png" alt="Image of Hobbiton">
                <figcaption>Hobbiton</figcaption>
            </figure>
        </section>
        <!--Figure 2-->
        <section class="section_two">
            <figure>
                <img src="images/planets/jeffbezos.png" alt="Image of Jeffbezos">
                <figcaption>Jeffbezos</figcaption>
            </figure>
        </section>
        <!--Figure 3-->
        <section class="section_three">
            <figure>
                <img src="images/planets/odysseus.png" alt="Image of Odysseus">
                <figcaption>Odysseus</figcaption>
            </figure>
        </section>
        <!--Figure 4-->
        <section class="section_four">
            <figure>
                <img src="images/planets/winturn.png" alt="Image of Winturn">
                <figcaption>Winturn</figcaption>
            </figure>
        </section>
    </article>
    <?php
    include ("footer.php");
    ?>
</main>

