<?php

class Kelas_model extends CI_Model
{


    function getAll()
    {

        return $this->db->get('kelas')->result();
    }

    function get_kls($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);

        return $this->db->get('kelas')->row();
    }

    function add($params)
    {
        $this->db->insert('kelas', $params);
        return $this->db->insert_id();
    }

    function updateKelas($id_kelas, $params)
    {
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->update('kelas', $params);
    }

    function delete($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);

        return $this->db->delete('kelas');
    }
}
