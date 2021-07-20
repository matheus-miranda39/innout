<?php
loadModel('User');

class Login extends Model {

    public function validate(){
        $errors = [];

        if(!$this->email) { 
            $errors['email'] = 'E-mail é um campo obrigatório';
        }
        
        if(!$this->password) {
            $errors['password'] = 'Por favor informe a senha'; 
        }

        if(count($errors)) {
            throw new ValidationException($errors);
        }
    }

    //verifica se o usuario existe
    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if($user){
            if($user->end_date){
                throw new AppException('Este usuario não faz mais parte da empresa');
            }
            if(password_verify($this->password, $user->password)){ //o primeiro password é o que o usuario digitou, o segundo é o que esta gravado no banco
                return $user;
            }
        }
        throw new AppException('O usuario e/ou senha inválidos');
    }
}