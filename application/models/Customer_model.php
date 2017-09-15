<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/15/2017
 * Time: 11:35 AM
 */

class Customer_model extends MY_Model
{
    public function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[50]|is_unique[customer.name]', ['required' => 'You must provide a %s']);
        $this->form_validation->set_rules('lastname', 'Password', 'trim|required|min_length[2]|max_length[50]', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[customer.email]|max_length[255]');
    }

    public function getDatas()
    {
        return [
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
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

    public function getEmail($email)
    {
        $query = $this->db->get_where($this->tableName(), ['email' => $email]);
        return $query->row();
    }
}