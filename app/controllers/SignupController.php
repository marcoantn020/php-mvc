<?php

namespace app\controllers;

use app\interfaces\ControllerInterface;
use app\models\activerecord\FindBy;
use app\models\activerecord\Insert;
use app\models\User;
use app\services\FlashMessage;
use app\services\validate\Validate;

class SignupController implements ControllerInterface

{
    public string $view;
    public array $data = [];

    public function index (array $args) 
    {

        $this->view = 'signup/index.php';
        $this->data = [
            'title' => 'Signup'
        ];
    }

    public function show (array $args) 
    {

    }

    public function edit (array $args) 
    {

    }

    public function update (array $args) 
    {

    }

    public function store () 
    {
       $validate = new Validate();
       $validate->handle([
           'name' => [REQUIRED],
           'username' => [REQUIRED],
           'password' => [REQUIRED, MAXLEN.':10'],
           'passworConfirmation' => [REQUIRED, MAXLEN.':10']
       ]);

       if ($validate->errors) {
            return redirect("/signup");
       }
       
       $data = (object) $validate->data;

       $userExists = (new User)->execute(new FindBy('username', $data->username));
       if ($userExists) {
        FlashMessage::set("userExists", "Este usuario já está cadastrado.");
        return redirect("/signup");
       }
       
       if ($data->password !== $data->passworConfirmation) {
        FlashMessage::set("passwordErrorMatch", "As senhas não são iguais.");
        return redirect("/signup");
       }

       $user = new User;
       $user->name = $data->name;
       $user->username = $data->username;
       $user->password = password_hash($data->password, PASSWORD_DEFAULT);
       $created = $user->execute(new Insert);
       if ($created) {
           FlashMessage::set('created', "Usuario criado com sucesso.", 'success');
           return redirect("/");
       }
    }

    public function destroy (array $args) 
    {

    }


}