<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 3:21 PM
 */

namespace App\Models;

use \App\DB;

class AgendarSecretaria
{
    public static function selectAll($id = null)
    {
        $where = '';
        if (!empty($id)) {
            $where = 'WHERE id = :id';
        }
        $sql = sprintf("SELECT * from Agendamento ORDER BY id ASC", $where);

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
    public static function save($agendamento)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($agendamento)) {
            echo "Volte e preencha todos os campos";
            return false;
        }
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        $isoDate = dateConvert($agendamento['data']);
        // insere no banco
        $DB = new DB;

        $sql = "INSERT INTO Agendamento(
                      medico_id,
                      paciente_id,
                      hora,
                      data, 
                      status) 
                    VALUES(
                    :medico_id,
                    :paciente_id,
                    :hora,
                    :data,
                    :status
                    )";


        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':medico_id', $agendamento['medico_id']);
        $stmt->bindParam(':paciente_id', $agendamento['paciente_id']);
        $stmt->bindParam(':hora', $agendamento['hora']);
        $stmt->bindParam(':data', $agendamento['data']);
        $stmt->bindValue(':status', 'A');

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
                        cidade_id =:cidade_id,
                        cep = :cep, 
                        complemento = :complemento, 
                        cpf = :cpf,
                        rg = :rg,
                        data_nascimento = :data_nascimento,
                        naturalidade = :naturalidade,
                        nacionalidade = :nacionalidade,
                        telefone = :telefone,  
                        celular = :celular, 
                        trabalho =:trabalho,
                        especialidade_id = :especialidade_id WHERE id = {$medico['id']}";

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':crm', $medico['crm']);
        $stmt->bindParam(':email', $medico['email']);
        $stmt->bindParam(':nome', $medico['nome']);
        $stmt->bindParam(':endereco', $medico['endereco']);
        $stmt->bindParam(':bairro', $medico['bairro']);
        $stmt->bindParam(':cidade_id', $medico['cidade_id']);
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
        $stmt->bindParam(':especialidade_id', $medico['especialidade_id']);

        User::medicoUpdate($medico);

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