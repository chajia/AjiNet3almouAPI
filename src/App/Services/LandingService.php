<?php

namespace App\Services;

class LandingService extends BaseService
{

    public function getOne($id_Landing)
    {
        return $this->db->fetchAssoc("SELECT * FROM Landing WHERE id_Landing=?", [(int) $id_Landing]);
    }

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM Landing");
    }

    function save($landing)
    {
        $this->db->insert("Landing", $landing);
        return $this->db->lastInsertId();
    }

    function update($id_Landing, $landing)
    {
        return $this->db->update('Landing', $landing, ['id_Landing' => $id_Landing]);
    }

    function delete($id_Landing)
    {
        return $this->db->delete("Landing", array("id_Landing" => $id_Landing));
    }

}
