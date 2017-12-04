<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 5:39 PM
 */

namespace App\Models;

use \App\DB;

class AtendimentoMedico
{
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
    public static function save($atendimento)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($atendimento)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        var_dump($atendimento);
        // insere no banco
        $DB = new DB;

        $sql = "INSERT INTO Atendimento(
                        agendamento_id, 
                        queixa_principal, 
                        pr_renais, 
                        pr_articulares, 
                        pr_cariacos, 
                        pr_respiratorios, 
                        pr_gastricos, 
                        alergias, 
                        hepatite, 
                        gravides, 
                        diabetes, 
                        pr_cicatrizacao, 
                        ultiliza_med) VALUES
                        (
                        :agendamento_id, 
                        :queixa_principal, 
                        :pr_renais, 
                        :pr_articulares, 
                        :pr_cariacos, 
                        :pr_respiratorios, 
                        :pr_gastricos, 
                        :alergias, 
                        :hepatite, 
                        :gravides, 
                        :diabetes, 
                        :pr_cicatrizacao, 
                        :ultiliza_med)";



        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':agendamento_id', $atendimento['agendamento_id']);
        $stmt->bindParam(':queixa_principal', $atendimento['queixa_principal']);
        $stmt->bindParam(':pr_renais', $atendimento['pr_renais']);
        $stmt->bindParam(':pr_articulares', $atendimento['pr_articulares']);
        $stmt->bindParam(':pr_cariacos', $atendimento['pr_cariacos']);
        $stmt->bindParam(':pr_respiratorios', $atendimento['pr_respiratorios']);
        $stmt->bindParam(':pr_gastricos', $atendimento['pr_gastricos']);
        $stmt->bindParam(':alergias', $atendimento['alergias']);
        $stmt->bindParam(':hepatite', $atendimento['hepatite']);
        $stmt->bindParam(':gravides', $atendimento['gravides']);
        $stmt->bindParam(':diabetes', $atendimento['diabetes']);
        $stmt->bindParam(':pr_cicatrizacao', $atendimento['pr_articulares']);
        $stmt->bindParam(':ultiliza_med', $atendimento['ultiliza_med']);

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