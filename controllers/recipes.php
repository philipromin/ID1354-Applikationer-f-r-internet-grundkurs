<?php

class Recipes extends Controller {
    protected function Index(){
        $viewmodel = new RecipeModel();
        $this->returnView($viewmodel->Index());
    }

    protected function recipe(){
        $viewmodel = new RecipeModel();
        $this->returnView($viewmodel->recipe());    
    }

    protected function addComment(){
        $viewmodel = new RecipeModel();
        $viewmodel->addComment();
    }

    protected function deleteComment(){
        $viewmodel = new RecipeModel();
        $viewmodel->deleteComment();
    }

    protected function showComments(){
        $viewmodel = new RecipeModel();
        $viewmodel->showComments();
    }
}