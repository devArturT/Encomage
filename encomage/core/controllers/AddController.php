<?php

namespace Core\Controllers;

use Core\Libs\View;
use Core\Models\Users;
use InvalidArgumentException;

class AddController extends Controller
{
    public function index()
    {
        View::render('add', []);
    }

    public function save()
    {
        try {
            $user = new Users();

            if (
                $_POST['inputFirstName'] == '' ||
                $_POST['inputLastName'] == '' ||
                $_POST['inputEmail'] == ''
            ) {
                throw new InvalidArgumentException('Please enter all fields.');
            }

            $user->first_name = $_POST['inputFirstName'];
            $user->last_name = $_POST['inputLastName'];
            $user->email = $_POST['inputEmail'];
            $user->add();
            $this->redirect('/add');
        } catch (InvalidArgumentException $e) {
            $errors = $e->getMessage();
            View::render('/add', compact('errors'));
        }
    }
}
