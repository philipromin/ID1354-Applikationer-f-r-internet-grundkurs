<?php 

$css = '<link rel="stylesheet" type="text/css" media="screen" href="'.ROOT_PATH.'assets/css/signup.css" />';
require "views/header.php";

?>

<div class="container">
    <h1>Please sign up</h1>

    <?php
        if (isset($_GET['error'])) {
            $err = $_GET['error'];
            if ($err == "emptyfields"){
                echo '<p class="signup-error">Please fill in all fields</p>';
            }
            else if ($err == "usertaken") {
                echo '<p class="signup-error">Username is already taken</p>';
            }
        } else if (isset($_GET['signup'])) {
            echo '<p class="signup-success">Signup successful</p>';
        }
    ?>
    <form class="signup-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" placeholder="Username" value="<?php echo isset($_GET["uid"]) ? $_GET["uid"] : ''?>">
        <input type="text" name="email" placeholder="Email" value="<?php echo isset($_GET["mail"]) ? $_GET["mail"] : ''?>">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="signup-submit">Sign up</button>
    </form>
    
</div>

</body>
</html>