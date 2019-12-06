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
    
    <article class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <section class="mySlides fade">
            <section class="numbertext">1 / 4</section>
            <img src="images/planets/hobbiton.png" alt="Image of Hobbiton" style="width:100%">
            <section class="text">Hobbiton</section>
        </section>

        <section class="mySlides fade">
            <section class="numbertext">2 / 4</section>
            <img src="images/planets/jeffbezos.png" alt="Image of Jeffbezos" style="width:100%">
            <section class="text">Jeffbezos</section>
        </section>

        <section class="mySlides fade">
            <section class="numbertext">3 / 4</section>
             <img src="images/planets/odysseus.png" alt="Image of Odysseus" style="width:100%">
            <section class="text">Odysseus</section>
        </section>
        
        <section class="mySlides fade">
            <section class="numbertext">4 / 4</section>
            <img src="images/planets/winturn.png" alt="Image of Winturn" style="width:100%">
            <section class="text">Winturn</section>
        </section>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </article>
    

    <!-- The dots/circles -->
    <article style="text-align:center">
        <section class="dot" onclick="currentSlide(1)"></section>
        <section class="dot" onclick="currentSlide(2)"></section>
        <section class="dot" onclick="currentSlide(3)"></section>
        <section class="dot" onclick="currentSlide(4)"></section>
    </article>
    <script>
            var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
    </script>
    <?php
    include ("footer.php");
    ?>
</main>

