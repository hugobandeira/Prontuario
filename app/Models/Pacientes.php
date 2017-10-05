<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 25/09/17
 * Time: 01:43
 */

namespace App\Models;

use \App\DB;

class Pacientes
{
    /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
    public static function selectAll($id = null)
    {
        $where = '';
        if (!empty($id)) {
            $where = 'WHERE id = :id';
        }
        $sql = sprintf("SELECT * FROM Pacientes %s ORDER BY id ASC", $where);

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
    public static function save($pacientes)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($pacientes)) {
            echo "Volte e preencha todos os campos";
            return false;
        }
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        //$isoDate = dateConvert($medico);

        // insere no banco
        $DB = new DB;


        $sql = "INSERT INTO Pacientes(
                            nome, 
                            endereco
                            bairro,
                            cidade,
                            estado,
                            cep,
                            complemento,
                            cpf,
                            rg,
                            data_nascimento,
                            naturalidade,
                            nacionalidade,
                            email,
                            telefone,
                            telefone_trabalho,
                            nome_pai,
                            nome_mae,
                            tipo_sangue)                       
                    VALUES(
                            :nome, 
                            :endereco
                            :bairro,
                            :cidade,
                            :estado,
                            :cep,
                            :complemento,
                            :cpf,
                            :rg,
                            :data_nascimento,
                            :naturalidade,
                            :nacionalidade,
                            :email,
                            :telefone,
                            :telefone_trabalho,
                            :nome_pai,
                            :nome_mae,
                            :tipo_sangue)";
var_dump($pacientes['nome']);
die();
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':nome', $pacientes['nome']);
        $stmt->bindParam(':endereco', $pacientes['endereco']);
        $stmt->bindParam(':bairro', $pacientes['bairro']);
        $stmt->bindParam(':cidade', $pacientes['cidade']);
        $stmt->bindParam(':estado', $pacientes['estado']);
        $stmt->bindParam(':cep', $pacientes['cep']);
        $stmt->bindParam(':complemento', $pacientes['complemento']);
        $stmt->bindParam(':rg', $pacientes['rg']);
        $stmt->bindParam(':data_nascimento', $pacientes['data_nascimento']);
        $stmt->bindParam(':naturalidade', $pacientes['naturalidade']);
        $stmt->bindParam(':nacionalidade', $pacientes['nacionalidade']);
        $stmt->bindParam(':email', $pacientes['email']);
        $stmt->bindParam(':telefone', $pacientes['telefone']);
        $stmt->bindParam(':telefone_trabalho', $pacientes['telefone_trabalho']);
        $stmt->bindParam(':nome_pai', $pacientes['nome_pai']);
        $stmt->bindParam(':nome_mae', $pacientes['nome_mae']);
        $stmt->bindParam(':tipo_sangue', $pacientes['tipo_sangue']);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
        return header('/pacientes');
    }


    /**
     * Altera no banco de dados um usuário
     */
    public static function update($medico)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($medico)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        //$isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;


        $sql = "UPDATE Medicos SET 
                        crm = :crm,
                        email = :email,
                        nome = :nome,
                        endereco = :endereco,
                        bairro = :bairro,
                        cidade =:cidade,
                        estado = :estado, 
                        cep = :cep, 
                        complemento = :complemento, 
                        cpf = :cpf,
                        rg = :rg,
                        data_nascimento = :data_nascimento,
                        naturalidade = :naturalidade,
                        nacionalidade = :nacionalidade,
                        telefone = :telefone,  
                        celular = :celular, 
                        trabalho =:trabalho WHERE id = {$medico['id']}";
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
        $sql = "DELETE FROM Medicos WHERE id = :id";
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