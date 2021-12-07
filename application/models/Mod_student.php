<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_student extends CI_Model {

    function getStudent()
    {
        return $this->db->get('mst_student');
    }

    function getAll()
    {
        $this->db->order_by('mst_student.id desc');
        return $this->db->get('mst_student');
    }

    function insertStudent($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekStudent($kode)
    {
        $this->db->where("id", $kode);
        return $this->db->get("mst_student");
    }

    function updateStudent($id, $data)
    {
        $this->db->where('id', $id);
		$this->db->update('mst_student', $data);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }
    
    function deleteStudent($kode, $table)
    {
        $this->db->where('id', $kode);
        $this->db->delete($table);
    }

}