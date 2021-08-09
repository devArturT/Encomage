<?php

namespace Core\Controllers;

use Core\Libs\View;
use Core\Models\Users;

class MainController extends Controller
{
    public function index()
    {
        $users = Users::all();
        View::render('home', compact('users'));
    }

    public function edit()
    {
        $user = Users::findOrFail($_GET['id']);
        View::render('edit', compact('user'));
    }

    public function update()
    {
        $user = Users::findOrFail($_POST['id']);
        $user->first_name = $_POST['inputFirstName'];
        $user->last_name = $_POST['inputLastName'];
        $user->email = $_POST['inputEmail'];
        $user->update();
        $this->redirect('/');
    }
}
