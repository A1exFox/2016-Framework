<?php

namespace app\controllers;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('user')) {
                $_SESSION['success'] = 'Success registration';
            } else {
                $_SESSION['error'] = 'Error. Try again.';
            }
            redirect();
        }
        View::setMeta('Sign up');
    }
    public function loginAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'Success authorize';
            } else {
                $_SESSION['error'] = 'Login/password is wrong.';
            }
            redirect('/');
        }
        View::setMeta('Sign in');
    }
    public function logoutAction()
    {
        if (isset($_SESSION['user']))
            unset($_SESSION['user']);
        redirect('/user/login');
    }
}