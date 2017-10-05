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
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function selectAll($id = null)
    {
        $where = '';
        if (!empty($id)) {
            $where = 'WHERE email = :email';
        }
        $sql = sprintf("SELECT * FROM Login %s ORDER BY id ASC", $where);

        $DB = new DB;
        $stmt = $DB->prepare($sql);

        if (!empty($where)) {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $medicos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $medicos;
    }


    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($medico)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($medico)) {
            echo "Volte e preencha todos os campos";
            return false;
        }
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        //$isoDate = dateConvert($medico);

        // insere no banco
        $DB = new DB;

        $sql = "INSERT INTO Medicos(
                        crm,
                        email,
                        nome,
                        endereco,
                        bairro,
                        cidade,
                        estado, 
                        cep, 
                        complemento, 
                        cpf,
                        rg,
                        data_nascimento ,
                        naturalidade,
                        nacionalidade,
                        telefone,  
                        celular,
                        trabalho) 
                    VALUES(
                        :crm,
                        :email,
                        :nome,
                        :endereco,
                        :bairro,
                        :cidade,
                        :estado, 
                        :cep, 
                        :complemento, 
                        :cpf,
                        :rg,
                        :data_nascimento ,
                        :naturalidade,
                        :nacionalidade,
                        :telefone,  
                        :celular,  
                        :trabalho)";


        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':crm', $medico['crm']);
        $stmt->bindParam(':email', $medico['email']);
        $stmt->bindParam(':nome', $medico['nome']);
        $stmt->bindParam(':endereco', $medico['endereco']);
        $stmt->bindParam(':bairro', $medico['bairro']);
        $stmt->bindParam(':cidade', $medico['cidade']);
        $stmt->bindParam(':estado', $medico['estado']);
        $stmt->bindParam(':cep', $medico['cep']);
        $stmt->bindParam(':cpf', $medico['cpf']);
        $stmt->bindParam(':rg', $medico['rg']);
        $stmt->bindParam(':complemento', $medico['complemento']);
        $stmt->bindParam(':data_nascimento', $medico['data_nascimento']);
        $stmt->bindParam(':naturalidade', $medico['naturalidade']);
        $stmt->bindParam(':nacionalidade', $medico['nacionalidade']);
        $stmt->bindParam(':telefone', $medico['telefone']);
        $stmt->bindParam(':celular', $medico['celular']);
        $stmt->bindParam(':trabalho', $medico['trabalho']);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
        return header('/medicos');
    }

    public static function verifica($user)
    {
        // valida o ID
        if (empty($user)) {
            echo "Usuario não informado";
            exit;
        }
        // remove do banco
        $DB = new DB;
        $sql = "SELECT * FROM users WHERE email = :email, senha :senha";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':email', $user['email']);
        $stmt->bindParam(':senha', $user['senha']);
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Usuario não existe";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}