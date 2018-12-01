<?php

class UserModel extends Model{
    public function register(){
        //Sanitize Input 
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($_POST['signup-submit'])){            
           
            $username = $post['username'];
            $email = $post['email'];
            $password = $post['password'];

            if (empty($username) || empty($email) || empty($password)) {
                header("Location: ".ROOT_URL."users/register?error=emptyfields&uid=".$username."&mail=".$email);
                exit();
            } else {
                //Check if username already exist
                $this->query('SELECT username FROM users WHERE username=:username');
                $this->bind(':username', $username);
                $row = $this->single();

                if(is_array($row)){
                    header("Location: ".ROOT_URL."users/register?error=usertaken&mail=".$email);
                    exit();
                } else {
                    //Hash Password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    //Insert into db
                    $this->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
                    $this->bind(':username', $username);
                    $this->bind(':email', $email);
                    $this->bind(':password', $hashedPassword);
                    $this->execute();

                    if($this->lastInsertId()) {
                        header('Location: '. ROOT_URL.'users/register?signup=sucess');
                        exit();
                    } else {
                        header("Location: ".ROOT_URL."users/register?error=sqlerror");
                    }
                }
            }        
        }
    }

    public function login () {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($_POST['login-submit'])){

            $username = $post['username'];
            $password = $post['password'];

            if (empty($username) || empty($password)) {
                header("Location: ".ROOT_URL."?error=emptyfields");
                exit();
            } else {
                $this->query('SELECT * FROM users WHERE username = :username');
                $this->bind(':username', $username);
                $row = $this->single();

                if(is_array($row)){
                    $passwordCheck = password_verify($password, $row['password']);
                    
                    if($passwordCheck == false){
                        header("Location: ".ROOT_URL."?error=wrongpwd");
                        exit();
                    } else if ($passwordCheck == true){
                        session_start();
                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        header("Location: ".ROOT_URL);
                        exit();
                    }
                } else {
                    header("Location: ".ROOT_URL."?error=nouser");
                    exit();
                }
            }                    
        }
    }
}