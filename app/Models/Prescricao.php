<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 9:26 PM
 */

namespace App\Models;

use App\DB;

class Prescricao
{
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function selectAll($id = null)
    {
        $where = '';
        if (!empty($id)) {
            $where = 'WHERE id = :id';
        }
        $sql = sprintf("SELECT * FROM users %s ORDER BY name ASC", $where);
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
    public static function save($prescricao, $agendamento_id)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($prescricao) && empty($agendamento_id)) {
            echo "Volte e preencha todos os campos";
            return false;
        }
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO prescricao(agendamento_id, prescricao) VALUES(:agendamento_id, :prescricao)";

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':agendamento_id', $agendamento_id);
        $stmt->bindParam(':prescricao', $prescricao['prescricao']);

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
        $sql = "UPDATE users SET name = :name, email = :email, nivel = :nivel WHERE id = :id";

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $medico['nome']);
        $stmt->bindParam(':email', $medico['email']);
        $stmt->bindValue(':nivel', 2);
        $stmt->bindParam(':id', $medico['crm'], \PDO::PARAM_INT);

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
    public static function update($user)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($user)) {
            echo "Volte e preencha todos os campos";
            return false;
        }


        $senha = md5($user['senha']);
        // insere no banco
        $DB = new DB;
        $sql = "UPDATE users SET name = :name, email = :email, senha = :senha, nivel= :nivel WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $user['name']);
        $stmt->bindParam(':email', $user['email']);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':nivel', $user['nivel']);
        $stmt->bindParam(':id', $user['id'], \PDO::PARAM_INT);

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