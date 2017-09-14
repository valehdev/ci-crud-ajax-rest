<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/11/2017
 * Time: 11:18 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends MY_Model
{
    public function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[255]|is_unique[user.username]', ['required' => 'You must provide a %s']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[255]', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]|max_length[255]');
    }

    private function getDatas()
    {
        return [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email')
        ];
    }

    public function findAll()
    {
        $query = $this->db->get($this->tableName());
        return $query->result();
    }


    public function findByPk($id)
    {
        $query = $this->db->get_where($this->tableName(), [$this->getPk() => $id]);
        return $query->row();
    }

    public function create()
    {
        return $this->db->insert('user', $this->getDatas());
    }

    public function update($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $this->getDatas());
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->tableName());
    }

}