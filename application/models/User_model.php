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

    public function create()
    {
        return $this->db->insert($this->tableName(), $this->getDatas());
    }

    public function update($id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tableName(), $this->getDatas());
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->tableName());
    }

    public function count()
    {
        return $this->db->count_all_results($this->tableName());
    }

    public function all($limit = 10)
    {
        $offset = $this->uri->segment(3);
        return $this->db->limit($limit, $offset)->get($this->tableName());
    }

}