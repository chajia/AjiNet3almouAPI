<?php

namespace App\Services;

class CustumerService extends BaseService
{

    public function getOne($id_Custumer)
    {
        return $this->db->fetchAssoc("SELECT * FROM Custumer WHERE id_Custumer=?", [(int) $id_Custumer]);
    }

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM Custumer");
    }

    function save($id_Custumer)
    {
        $this->db->insert("Custumer", $id_Custumer);
        return $this->db->lastInsertId();
    }

    function update($id_Custumer, $custumer)
    {
        return $this->db->update('Custumer', $custumer, ['id_Custumer' => $id_Custumer]);
    }

    function delete($id_Custumer)
    {
        return $this->db->delete("Custumer", array("id_Custumer" => $id_Custumer));
    }

}
