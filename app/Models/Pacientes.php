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
        $sql = sprintf("SELECT * FROM Paci %s ORDER BY id ASC", $where);

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
        $isoDate = dateConvert($pacientes['data_nascimento']);

        // insere no banco
        $DB = new DB;

//  `nome` varchar(45) NOT NULL,
//  `endereco` varchar(105) DEFAULT NULL,
//  `bairro` varchar(45) DEFAULT NULL,
//  `cidades` varchar(45) DEFAULT NULL,
//  `estado` varchar(45) DEFAULT NULL,
//  `cep` varchar(45) DEFAULT NULL,
//  `complemento` varchar(45) DEFAULT NULL,
//  `cpf` int(11) NOT NULL,
//  `rg` int(11) NOT NULL,
//  `data_nascimento` date NOT NULL,
//  `naturalidade` varchar(45) DEFAULT NULL,
//  `nacionalidade` varchar(45) DEFAULT NULL,
//  `email` varchar(45) DEFAULT NULL,
//  `telefone` int(11) DEFAULT NULL,
//  `telefone_trabalho` int(11) DEFAULT NULL,
//  `nome_pai` varchar(45) DEFAULT NULL,
//  `nome_mae` varchar(45) DEFAULT NULL,
//  `tipo_sangue` varchar(45) NOT NULL

        $sql = "INSERT INTO Paci(
                            nome, 
                            endereco,
                            bairro,
                            cidades,
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
                            tipo_sangue
                            )                       
                    VALUES(
                            :nome, 
                            :endereco,
                            :bairro,
                            :cidades,
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
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $pacientes['nome']);
        $stmt->bindParam(':endereco', $pacientes['endereco']);
        $stmt->bindParam(':bairro', $pacientes['bairro']);
        $stmt->bindParam(':cidades', $pacientes['cidades']);
        $stmt->bindParam(':estado', $pacientes['estado']);
        $stmt->bindParam(':cep', $pacientes['cep']);
        $stmt->bindParam(':complemento', $pacientes['complemento']);
        $stmt->bindParam(':cpf', $pacientes['cpf']);
        $stmt->bindParam(':rg', $pacientes['rg']);
        $stmt->bindParam(':data_nascimento', $isoDate);
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
    }


    /**
     * Altera no banco de dados um usuário
     */
    public static function update($pacientes)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($pacientes)) {
            echo "Volte e preencha todos os campos";
            return false;
        }
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        $isoDate = dateConvert($pacientes['data_nascimento']);

        // insere no banco
        $DB = new DB;

//        nome` varchar(45) NOT NULL,
//  `endereco` varchar(105) DEFAULT NULL,
//  `bairro` varchar(45) DEFAULT NULL,
//  `cidades` varchar(45) DEFAULT NULL,
//  `estado` varchar(45) DEFAULT NULL,
//  `cep` varchar(45) DEFAULT NULL,
//  `complemento` varchar(45) DEFAULT NULL,
//  `cpf` int(11) NOT NULL,
//  `rg` int(11) NOT NULL,
//  `data_nascimento` date NOT NULL,
//  `naturalidade` varchar(45) DEFAULT NULL,
//  `nacionalidade` varchar(45) DEFAULT NULL,
//  `email` varchar(45) DEFAULT NULL,
//  `telefone` int(11) DEFAULT NULL,
//  `telefone_trabalho` int(11) DEFAULT NULL,
//  `nome_pai` varchar(45) DEFAULT NULL,
//  `nome_mae` varchar(45) DEFAULT NULL,
//  `tipo_sangue` varchar(45) NOT NULL

        $sql = "UPDATE Paci SET 
                            nome = :nome, 
                            endereco = :endereco,
                            bairro = :bairro,
                            cidades = :cidades,
                            estado = :estado,
                            cep = :cep,
                            complemento = :complemento,
                            cpf = :cpf,
                            rg = :rg,
                            data_nascimento = :data_nascimento,
                            naturalidade = :naturalidade,
                            nacionalidade = :nacionalidade,
                            email = :email,
                            telefone = :telefone,
                            telefone_trabalho = :telefone_trabalho,
                            nome_pai = :nome_pai,
                            nome_mae = :nome_mae,
                            tipo_sangue = :tipo_sangue WHERE id = {$pacientes['id']}";

        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':nome', $pacientes['nome']);
        $stmt->bindParam(':endereco', $pacientes['endereco']);
        $stmt->bindParam(':bairro', $pacientes['bairro']);
        $stmt->bindParam(':cidades', $pacientes['cidades']);
        $stmt->bindParam(':estado', $pacientes['estado']);
        $stmt->bindParam(':cep', $pacientes['cep']);
        $stmt->bindParam(':complemento', $pacientes['complemento']);
        $stmt->bindParam(':cpf', $pacientes['cpf']);
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
        $sql = "DELETE FROM Paci WHERE id = :id";
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