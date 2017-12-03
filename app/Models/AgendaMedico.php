<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/2/17
 * Time: 9:37 PM
 */

namespace App\Models;

use App\DB;

class AgendaMedico
{
    public static function all($id = null)
    {
        $medico = Medicos::medico($id);

        $sql = sprintf("
SELECT Medicos.nome as medico, Paci.nome as paciente, Agendamento.* from Agendamento
  INNER JOIN Medicos on Agendamento.medico_id = Medicos.id 
  INNER JOIN Paci on Agendamento.paciente_id = Paci.id  WHERE medico_id = :id ORDER BY data_hora ASC");

        $DB = new DB;
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $medico['id'], \PDO::PARAM_INT);

        $stmt->execute();

        $medicos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $medicos;
    }


}