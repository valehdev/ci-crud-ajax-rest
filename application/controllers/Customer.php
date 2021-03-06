<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/15/2017
 * Time: 11:19 AM
 */

class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model', 'model');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('customer/index');
        $this->load->view('layout/footer');
    }

    public function index_json()
    {
        echo json_encode($this->model->findAll());
    }

    public function create_json()
    {
        $this->model->rules();

        $msg['success'] = false;
        $msg['type'] = 'create';

        if ($this->form_validation->run()) {
            $this->model->create();
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function view_json()
    {
        echo json_encode($this->model->findByPk($this->getId()));
    }


    public function update_json()
    {
        $this->model->rules();

        $msg['success'] = false;
        $msg['type'] = 'update';

        if ($this->form_validation->run()) {
            $this->model->update($this->getId());
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    public function delete_json()
    {
        // @todo something
    }

    public function getEmailJson()
    {
        $email = $this->input->post('email');
        echo json_encode($this->model->getEmail($email));
    }

}