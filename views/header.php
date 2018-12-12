<?php
    $activePage = $_GET['controller'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tasty Recipes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT_PATH; ?>assets/css/reset.css" />
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT_PATH; ?>assets/css/header.css" />
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
    </script>
    <script src="<?php echo ROOT_PATH; ?>assets/js/loginScript.js"></script>
    <?php
        if(isset($css)){
            echo $css;
        }
        if(isset($js)){
            echo $js;
        }
    ?>
</head>
<body>

    <header>
        <nav>
            <a class="logo" href="<?php echo ROOT_URL;?>"><img src="<?php echo ROOT_PATH;?>assets/images/chef.png" alt="Logo"></a>
            <ul class="navigation">
                <li>
                    <a class="<?php echo ($activePage == 'recipes') ? 'active-page':''?>" href="<?php echo ROOT_URL; ?>recipes">Recipes</a>
                </li>
                <li>
                    <a class="<?php echo ($activePage == 'calendar') ? 'active-page':''?>" href="<?php echo ROOT_URL; ?>calendar">Calendar</a>
                </li>
            </ul>  
            
            <div class="login">
                <?php if (!isset($_SESSION['userId'])) : ?>
                        <form class='login-form' action='' method='POST'>
                            <input type='text' name='username' placeholder='Username...'>
                            <input type='password' name='password' placeholder='Password...'>
                            <button class='nav-button' type='submit' name='login-submit'>Log in</button>
                        </form>
                        <a class='signup-link' href='<?php echo ROOT_URL; ?>users/register'>Signup</a>                    
                <?php else : ?>
                    <form class='logout-form' action=''>
                        <button class='nav-button' type='submit' name='logout-submit'>Logout</button>
                    </form>
                <?php endif ?>                 
            </div>
        </nav>
    </header>