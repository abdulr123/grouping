<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Role extends CI_Controller
{
    public function hapus_role($id)
    {
        $where = array('id' => $id);
        $this->role_model->hapus_role($where, 'user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Role deleted</div>');
        redirect('admin/role');
    }
}

