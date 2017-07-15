<?php

namespace App\Services;

class FormateurService extends BaseService
{

    public function getOne($id_Formateur)
    {
        return $this->db->fetchAssoc("SELECT * FROM Formateur WHERE id_Formateur=?", [(int) $id_Formateur]);
    }

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM Formateur");
    }

    function save($formateur)
    {
        $this->db->insert("Formateur", $formateur);
        return $this->db->lastInsertId();
    }

    function update($id_Formateur, $formateur)
    {
        return $this->db->update('Formateur', $formateur, ['id_Formateur' => $id_Formateur]);
    }

    function delete($id_Formateur)
    {
        return $this->db->delete("Formateur", array("id_Formateur" => $id_Formateur));
    }

}
