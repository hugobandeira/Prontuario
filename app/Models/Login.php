<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 25/09/17
 * Time: 01:43
 */

namespace App\Models;

use \App\DB;

class Login
{
    public static function verifica($login, $senha)
    {
        // valida o ID
        if (empty($login) || empty($login)) {
            echo "Usuario não informado";
            exit;
        }

        $DB = new DB;

        $sql = "SELECT * from users WHERE email = :email";


        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':email', $login);
//        $stmt->bindParam(':senha', $senha);


        $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $user;

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Usuario não existe";
            print_r($DB->errorInfo());
            return false;
        }
    }

    public static function teste($email, $senha)
    {
        if (empty($email)) {
            return 'array vazia';
        }

        $sql = sprintf("SELECT * FROM users WHERE email = :email AND  senha = :senha");

        $DB = new DB;
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();
        $user = $stmt->fetchAll();

        if (!empty($user)) {
            return $user;
        } else {
            return false;
        }


    }
}
