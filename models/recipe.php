<?php

class RecipeModel extends Model{
    public function Index(){
        return;
    }

    public function recipe(){
        $recipeId = $_GET['id'];
        $xml = simplexml_load_file("resources/recipes.xml") or die("Error: Cannot create object");
        $recipe = $xml->xpath('recipe[@id="'.$recipeId.'"]');

        /*

        */

        return $recipe;
    }

    public function addComment() {

        $username = $_POST['username'];
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
        $recipeId = $_POST['recipeId'];

        if(!empty($message)) {
            $this->query('INSERT INTO comments (uid, message, recipeId) VALUES (:username, :message, :recipeId)');
            $this->bind(':username', $username);
            $this->bind(':message', $message);
            $this->bind(':recipeId', $recipeId);
            $this->execute();         
        }   
    }

    public function deleteComment() {

            $cid = $_POST['cid'];
            echo $cid;

            $this->query('DELETE FROM comments WHERE cid = :cid');
            $this->bind(':cid', $cid);
            $this->execute();
            
    }

    public function showComments(){
        $recipeId = $_GET['id'];

        $this->query('SELECT * FROM comments WHERE recipeId = :recipeId');
        $this->bind(':recipeId', $recipeId);
        $row = $this->resultSet();

        $user = '';

        if (isset($_SESSION['userId'])) {
            $user = $_SESSION['username'];
        }

        $data = array(
            'comments' => $row,
            'user' => $user
        );

        echo json_encode($data);
    }
}