<?php 

$css = '<link rel="stylesheet" type="text/css" media="screen" href="'.ROOT_PATH.'assets/css/recipe.css" />';
$js = '<script src="'.ROOT_PATH.'assets/js/recipeScript.js"></script>';
require "views/header.php";

$recipeId =$_GET['id'];

$title = $viewmodel[0]->title;
$instructions = $viewmodel[0]->instructions->instruction;
$ingredients = $viewmodel[0]->ingredients->ingredient;
$image = ROOT_PATH. $viewmodel[0]->image;

?>

<div class="container">
        <section class="left-section">
            <h1><?php echo $title; ?></h1>
            <img src="<?php echo $image?>" alt="">
            <h4>Ingredients</h4>
            <ul>
                <?php foreach($ingredients as $ingredient) : ?>
                    <li><?php echo $ingredient; ?></li>
                <?php endforeach ?>
            </ul>
        </section>
        <section class="right-section">
            <h4>Instructions</h4>
            <ol>
                <?php foreach($instructions as $instruction) : ?>
                    <li><?php echo $instruction; ?></li>
                <?php endforeach ?>
            </ol>
            <h4>Comments</h4>
            <?php if (isset($_SESSION['userId'])) : ?>                
                <form id='comment-form' action='' method='POST'>
                    <input type='hidden' name='username' value='<?php echo $_SESSION['username']; ?>'>
                    <input type='hidden' name='recipeId' value='<?php echo $recipeId; ?>'>
                    <textarea name='message' id=''></textarea>
                    <button class='comment-btn' type='submit' name='comment-submit'>Comment</button>
                </form>                
            <?php endif ?>
            
            <div class="comments">

            </div>
        </section>     
    </div>
</body>
</html>

