<?php

namespace app\controllers\site;

use app\interfaces\ControllerInterface;
use app\models\activerecord\FindBy;
use app\models\User;
use app\services\BlockNoReason;
use app\services\BlockNotLogged;
use app\services\FlashMessage;

class LoginController implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master = 'site/index.php';

    public function __construct ()
    {
        BlockNoReason::block($this, ['store']);
    }

    public function index (array $args)
    {
        $this->view = 'site/login/index.php';
        $this->data = [
            'title' => 'Login'
        ];
    }
    
    public function store ()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $user = new User;
        $userFound = $user->execute(new FindBy('username', $username));
        if (!$userFound) {
            FlashMessage::set("login", "Usuario ou senha inválidos!");
            return redirect("/login");
        }
        $passwordMatch = password_verify($password, $userFound->password);
        if (!$passwordMatch) {
            FlashMessage::set("login", "Usuario ou senha inválidos!");
            return redirect("/login");
        }

        unset($userFound->password);
        $_SESSION['user'] = $userFound;
        return redirect('/');
        
    }

    public function destroy (array $args)
    {
        unset($_SESSION['user']);
        return redirect("/login");
    }

    public function show (array $args) {

    }
    
    public function edit (array $args) {

    }
    
    public function update (array $args) {

    }
    
}