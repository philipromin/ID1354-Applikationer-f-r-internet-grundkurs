<?php 

$css = '<link rel="stylesheet" type="text/css" media="screen" href="'.ROOT_PATH.'assets/css/recipe.css" />';
require "views/header.php";

$recipeId =$_GET['id'];

$title = $viewmodel['recipe'][0]->title;
$instructions = $viewmodel['recipe'][0]->instructions->instruction;
$ingredients = $viewmodel['recipe'][0]->ingredients->ingredient;
$image = ROOT_PATH. $viewmodel['recipe'][0]->image;

$comments = $viewmodel['comments'];

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
                <form action='<?php echo ROOT_URL; ?>recipes/addComment' method='POST'>
                    <input type='hidden' name='username' value='<?php echo $_SESSION['username']; ?>'>
                    <input type='hidden' name='recipeId' value='<?php echo $recipeId; ?>'>
                    <textarea name='message' id=''></textarea>
                    <button class='comment-btn' type='submit' name='comment-submit'>Comment</button>
                </form>                
            <?php endif ?>
            <?php foreach ($comments as $comment)  : ?>
                <article class='comment'> 
                    <p class='uid'><?php echo $comment['uid']; ?></p>
                    <p class='message'><?php echo nl2br($comment['message']);?></p>
                    <form class='delete-form' method='POST' action='<?php echo ROOT_URL; ?>recipes/deleteComment'>
                        <input type='hidden' name='cid' value='<?php echo $comment['cid']; ?>'>
                        <?php if (isset($_SESSION['userId'])) 
                            echo ($_SESSION['username'] == $comment['uid']) ? "<button type='submit' name='comment-delete'>Delete</button>" : "";
                        ?>
                    </form>
                </article>
            <?php endforeach ?>
        </section>     
    </div>
</body>
</html>

