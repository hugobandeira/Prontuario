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
        $sql = sprintf("SELECT Medicos.nome as medico, Paci.nome as paciente, Agendamento.*
FROM Agendamento
  INNER JOIN Medicos ON Agendamento.medico_id = Medicos.id
  INNER JOIN Paci ON Agendamento.paciente_id = Paci.id %s ORDER BY id ASC", $where);

        $DB = new DB;
        $stmt = $DB->prepare($sql);

        if (!empty($where)) {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();
        $agendamento = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $agendamento;
    }

    public static function show($id = null)
    {
        $where = '';
        if (!empty($id)) {
            $where = 'WHERE id = :id';
        }
        $sql = sprintf("SELECT * from Agendamento %s ORDER BY id ASC", $where);

        $DB = new DB;
        $stmt = $DB->prepare($sql);

        if (!empty($where)) {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();
        $agendamento = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $agendamento;
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
    public static function update($agendamento)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($agendamento)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        //$isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;

        $sql = "UPDATE Agendamento SET 
                        medico_id = :medico_id,
                        hora = :hora,
                        data = :data 
                        WHERE id = :id";

        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':id', $agendamento['id']);
        $stmt->bindParam(':medico_id', $agendamento['medico_id']);
        $stmt->bindParam(':hora', $agendamento['hora']);
        $stmt->bindParam(':data', $agendamento['data']);

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
        $sql = "DELETE FROM Agendamento WHERE id = :id";
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