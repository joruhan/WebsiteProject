<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Caps & Daps</title>
</head>
<body>
    <?php
        include("header.html");
    ?>

    <div class="landing-page">
        <img class="landing-page-img" src="https://img.freepik.com/premium-photo/assorted-win…rel-display-clothing-store_97843-31204.jpg?w=2000" alt="Slide 1">
        <img class="landing-page-img" src="https://www.freedomofmovement.co.za/cdn/shop/collections/Untitled_design_83.png?v=1710404788" alt="Slide 2">
        <img class="landing-page-img" src="https://www.freedomofmovement.co.za/cdn/shop/collections/Untitled_design_81.png?v=1702039435" alt="Slide 2">
        <img class="landing-page-img" src="https://www.freedomofmovement.co.za/cdn/shop/collections/Untitled_design_71.png?v=1697806491" alt="Slide 2">
        <img class="landing-page-img" src="https://www.freedomofmovement.co.za/cdn/shop/collections/Untitled_design_74.png?v=1692113811" alt="Slide 2">

        <a href="allProducts.php">
            <button class="landing-page-btn">Shop Now</button>
        </a>
    </div>
 
    <div class="products-container">
        <a href="#" class="collection">
            <div>
                <img src=https://www.freedomofmovement.co.za/cdn/shop/files/Untitled_design_68.png?v=1692112194&width=800 alt="Men Clothing Image">
                <div>
                    <p>Bags</p>
                </div>
            </div>
        </a>
 
        <a href="#" class="collection">
            <div>
                <img src=https://www.freedomofmovement.co.za/cdn/shop/files/Untitled_design_67.png?v=1692111239&width=800 alt="Women Clothing Image">
                <div>
                    <p>Shoes</p>
                </div>
            </div>
        </a>
 
        <a href="#" class="collection">
            <div>
                <img src=https://www.freedomofmovement.co.za/cdn/shop/files/Untitled_design_69.png?v=1692112288&width=800 alt="Men Clothing Image">
                <div>
                    <p>Clothing</p>
                </div>
            </div>
        </a>
 
        <a href="#" class="collection">
            <div>
                <img src=https://www.freedomofmovement.co.za/cdn/shop/files/Untitled_design_70.png?v=1692112794&width=800 alt="Coming Soon Images">
                <div>
                    <p>Accessories</p>
                </div>
            </div>
        </a>
    </div>

    
<?php
    include("footer.html");
?>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("landing-page-img");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 3500); 
    }
</script>
</body>
</html>