<?php 

$css = '<link rel="stylesheet" type="text/css" media="screen" href="'.ROOT_PATH.'assets/css/recipes.css" />';
require "views/header.php";

?>

<div class="container">
        <article>
            <a href="<?php ROOT_URL?>recipes/recipe/1">
                <img src="/tastyrecipes/images/pancakes.jpg" alt="Picture of pancakes">
                <h2>Pancakes</h2>
            </a>
        </article>
        <article>
            <a href="<?php ROOT_URL?>recipes/recipe/2">
                <img src="/tastyrecipes/images/meatballs.jpg" alt="Picture of meatballs">
                <h2>Meatballs</h2>
            </a>
        </article>
        <article>
            <img src="/tastyrecipes/images/cuisine.jpg" alt="Picture of pasta">
            <h2>Some pasta</h2>
        </article>
        <article>
            <img src="/tastyrecipes/images/kaka.jpg" alt="Picture of cake">
            <h2>Cake</h2>
        </article>
        <article>
            <img src="/tastyrecipes/images/salad.jpg" alt="Picture of salad">
            <h2>Salad</h2>
        </article>
        <article>
            <img src="/tastyrecipes/images/kaka.jpg" alt="Picture of cake">
            <h2>More cake</h2>
        </article>
        <article>
            <img src="/tastyrecipes/images/cuisine.jpg" alt="Picture of pasta">
            <h2>More pasta</h2>
        </article>
        <article>
            <img src="/tastyrecipes/images/kaka.jpg" alt="Picture of cake">
            <h2>More cake</h2>
        </article>
    </div>
      
</body>
</html>