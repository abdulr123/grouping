<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function edit_datamahasiswa($where, $table)
    {

        return $this->db->get_where($table, $where);
    }

    public function hapus_datamahasiswa($where, $data)
    {
        $this->db->where($where);
        $this->db->delete($data);
    }

    public function update_datamahasiswa($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit_dataclass($where, $table)
    {

        return $this->db->get_where($table, $where);
    }

    public function edit_subject($where, $table)
    {

        return $this->db->get_where($table, $where);
    }

    public function update_subject($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_subject($where, $data)
    {
        $this->db->where($where);
        $this->db->delete($data);
    }

    public function update_dataclass($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_dataclass($where, $data)
    {
        $this->db->where($where);
        $this->db->delete($data);
    }

    public function hapus_major($where, $data)
    {
        $this->db->where($where);
        $this->db->delete($data);
    }
}
