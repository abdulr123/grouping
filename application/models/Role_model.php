<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function hapus_role($where, $data)
    {
        $this->db->where($where);
        $this->db->delete($data);
    }
}
