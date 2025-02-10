<?php 

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login( Router $router) {

        $errores = [];



        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validar();
        
            if(empty($errores)) {
                // Asigna el resultado de la consulta a la variable $resultado
                $resultado = $auth->existeUsuario();
    
                // Ahora, como $resultado es un arreglo, revisa el primer elemento
                if(!$resultado[0]) {
                    $errores = Admin::getErrores();
                } else {
                    // Pasa el objeto mysqli_result, que está en el índice 1, a la función verificarPassword
                    if($auth->verificarPassword($resultado[1])) {
                        header('Location: /admin');
                        exit;
                    } else {
                        $errores = Admin::getErrores();
                    }
                }
            }
        
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]); 
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}