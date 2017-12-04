<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 10:48 PM
 */

namespace App\Models;

use App\DB;

class MedicoPaciente
{
    public static function all($id)
    {
        $medico = Medicos::medico($id);

        $DB = new DB;
        $sql = sprintf("SELECT DISTINCT Paci.nome, paciente_id  FROM Agendamento
  INNER JOIN Paci ON Agendamento.paciente_id = Paci.id  WHERE medico_id = :medico ORDER BY nome ASC");

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':medico', $medico['id'], \PDO::PARAM_INT);

        $stmt->execute();

        $pacientes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $pacientes;


        if (empty($id)) {
            echo 'preencha todos os campos';
            return false;
        }

        $DB = new DB();

        $sql = "";


        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':agendamento_id', $atendimento['agendamento_id']);

    }
}