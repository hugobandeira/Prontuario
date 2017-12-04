<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/4/17
 * Time: 4:53 PM
 */

namespace App\Models;

use App\DB;

class Historico
{
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function agendamentos($id)
    {
        $sql = sprintf("SELECT * FROM view_agendamento WHERE id = :id");
        $DB = new DB;
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        if ($stmt->execute()) {
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $users;
        };
    }


    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($hipotese, $agendamento_id)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($hipotese) && empty($agendamento_id)) {
            echo "Volte e preencha todos os campos";
            return false;
        }
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO hiposete(agendamento_id, hipotese, obs) VALUES(:agendamento_id, :hipotese, :obs)";

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':agendamento_id', $agendamento_id);
        $stmt->bindParam(':hipotese', $hipotese['hipotese']);
        $stmt->bindParam(':obs', $hipotese['obs']);

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
        $sql = "INSERT INTO users(id, name, email, senha ) VALUES(:id ,:name , :email, :senha)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $medico['crm']);
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

}