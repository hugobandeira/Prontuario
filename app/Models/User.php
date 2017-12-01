<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 27/09/17
 * Time: 01:54
 */

namespace App\Models;

use App\DB;

class User
{
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function selectAll($id = null)
    {
        $where = '';
        if (!empty($id)) {
            $where = 'WHERE id = :id';
        }
        $sql = sprintf("SELECT id, email, senha, senha FROM users %s ORDER BY name ASC", $where);
        $DB = new DB;
        $stmt = $DB->prepare($sql);

        if (!empty($where)) {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }


    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($name, $email, $gender, $birthdate)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($name) || empty($email) || empty($gender) || empty($birthdate)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        $isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO users(name, email, senha ) VALUES(:name , :email, :senha)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthdate', $isoDate);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public static function medico($medico)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($medico)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        $senha = md5('admin123');

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO users(name, email, senha ) VALUES(:name , :email, :senha)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $medico['nome']);
        $stmt->bindParam(':email', $medico['email']);
        $stmt->bindParam(':senha', $senha);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }


    public static function medicoUpdate($medico)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($medico)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // insere no banco
        $DB = new DB;
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $medico['nome']);
        $stmt->bindParam(':email', $medico['email']);
        $stmt->bindParam(':id', $medico['id'], \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    /**
     * Altera no banco de dados um usuário
     */
    public static function update($id, $name, $email, $gender, $birthdate)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($name) || empty($email) || empty($gender) || empty($birthdate)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        $isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;
        $sql = "UPDATE users SET name = :name, email = :email, gender = :gender, birthdate = :birthdate WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthdate', $isoDate);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }


    public static function remove($id)
    {
        // valida o ID
        if (empty($id)) {
            echo "ID não informado";
            exit;
        }

        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}