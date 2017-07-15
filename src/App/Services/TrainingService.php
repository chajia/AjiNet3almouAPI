<?php

namespace App\Services;

class TrainingService extends BaseService
{

    public function getOne($id_Training)
    {
        return $this->db->fetchAssoc("SELECT * FROM Training WHERE id_Training=?", [(int) $id_Training]);
    }

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM Training");
    }

    function save($training)
    {
        $this->db->insert("Training", $training);
        return $this->db->lastInsertId();
    }

    function update($id_Training, $training)
    {
        return $this->db->update('Training', $training, ['id_Training' => $id_Training]);
    }

    function delete($id_Training)
    {
        return $this->db->delete("Training", array("id_Training" => $id_Training));
    }

}
