<?php

class Siswa_model extends CI_Model
{

    function getAll()
    {
        return  $this->db->get('siswa')->result();
    }
    function getFetch($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('siswa')->row();
    }

    function add($siswa)
    {

        $this->db->insert('siswa', $siswa);

        return $this->db->insert_id();
    }

    function update($id_siswa, $siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->update('siswa', $siswa);
    }

    function delete($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->delete('siswa');
    }
}
