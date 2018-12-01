<?php

class RecipeModel extends Model{
    public function Index(){
        return;
    }

    public function recipe(){
        $recipeId = $_GET['id'];
        $xml = simplexml_load_file("resources/recipes.xml") or die("Error: Cannot create object");
        $recipe = $xml->xpath('recipe[@id="'.$recipeId.'"]');

        $this->query('SELECT * FROM comments WHERE recipeId = :recipeId');
        $this->bind(':recipeId', $recipeId);
        $row = $this->resultSet();

        $result = [
            'recipe' => $recipe,
            'comments' => $row
        ];

        return $result;
    }

    public function addComment() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($_POST['comment-submit'])){

            $username = $post['username'];
            $message = htmlspecialchars($post['message'], ENT_QUOTES);
            $recipeId = $post['recipeId'];

            if(empty($message)) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $this->query('INSERT INTO comments (uid, message, recipeId) VALUES (:username, :message, :recipeId)');
                $this->bind(':username', $username);
                $this->bind(':message', $message);
                $this->bind(':recipeId', $recipeId);
                $this->execute();

                if($this->lastInsertId()){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }   
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function deleteComment() {

        if(isset($_POST['comment-delete'])){
            $cid = $_POST['cid'];

            $this->query('DELETE FROM comments WHERE cid = :cid');
            $this->bind(':cid', $cid);
            $this->execute();
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();

        } else {

        }
    }
}