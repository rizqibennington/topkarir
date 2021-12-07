<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_teacher extends CI_Model {

    function getTeacher()
    {
        return $this->db->get('mst_teacher');
    }

    function getAll()
    {
        $this->db->order_by('mst_teacher.id desc');
        return $this->db->get('mst_teacher');
    }

    function insertTeacher($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekTeacher($kode)
    {
        $this->db->where("id", $kode);
        return $this->db->get("mst_teacher");
    }

    function updateTeacher($id, $data)
    {
        $this->db->where('id', $id);
		$this->db->update('mst_teacher', $data);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }
    
    function deleteTeacher($kode, $table)
    {
        $this->db->where('id', $kode);
        $this->db->delete($table);
    }

}