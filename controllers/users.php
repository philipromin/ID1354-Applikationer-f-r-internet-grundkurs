<?php

class Users extends Controller {
    protected function register () {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->register());
    }

    protected function login () {
        $viewmodel = new UserModel();
        $viewmodel->login();
    }

    protected function logout() {
        $viewmodel = new UserModel();
        $viewmodel->logout();
    }
}