$(document).ready(function(){
    
    $('.login-form').on('submit', function (e) {

        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "http://localhost/tastyajax/users/login",
            method: "POST",
            data: formData,
            dataType: "JSON",
            success: function(res){
                if(res.error != ''){
                    alert(res.error);
                } else {
                    $('.login').html(
                    `
                        <form class='logout-form' action=''>
                        <button class='nav-button' type='submit' name='logout-submit'>Logout</button>
                        </form>                    
                    `);
                }
            }
        });
    });

    $('.logout-form').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
            url: "http://localhost/tastyajax/users/logout",
            method: "POST",
            success: function(res){
                $('.login').html(
                `
                    <form class='login-form' action='' method='POST'>
                        <input type='text' name='username' placeholder='Username...'>
                        <input type='password' name='password' placeholder='Password...'>
                        <button class='nav-button' type='submit' name='login-submit'>Log in</button>
                    </form>
                    <a class='signup-link' href='<?php echo ROOT_URL; ?>users/register'>Signup</a>                    
                `);            
            }
        });
    });
});