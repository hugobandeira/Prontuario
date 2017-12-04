<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 12/3/17
 * Time: 9:55 PM
 */

namespace App\Models;

use App\DB;

class Atestado
{
    public static function save($atestado, $agendamento_id)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($atestado && $agendamento_id)) {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO atestado(agendamento_id, atestado) VALUES(:agendamento_id, :atestado)";

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':agendamento_id', $agendamento_id);
        $stmt->bindParam(':atestado', $atestado['atestado']);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}