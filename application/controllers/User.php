<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/11/2017
 * Time: 11:18 AM
 */

/**
 * @property $this
 */


defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('user/index');
        $this->load->view('layout/footer');
    }

    public function index_json()
    {
        echo json_encode($this->user_model->findAll());
    }

    public function view()
    {
        $this->load->view('layout/header');
        $this->load->view('user/view');
        $this->load->view('layout/footer');
    }

    public function view_json()
    {
        $result = $this->user_model->findByPk($this->getId());
        echo json_encode($result);
    }

    public function create()
    {
        $this->load->view('layout/header');
        $this->load->view('user/create');
        $this->load->view('layout/footer');
    }

    public function create_json()
    {
        $this->user_model->rules();
        $msg['success'] = false;
        $msg['type'] = 'create';
        if ($this->form_validation->run()) {
            $this->user_model->create();
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function update()
    {
        $this->load->view('layout/header');
        $this->load->view('user/update');
        $this->load->view('layout/footer');;
    }

    public function update_json()
    {
        $this->user_model->rules();

        $msg['success'] = false;
        $msg['type'] = 'update';

        if ($this->form_validation->run()) {
            $this->user_model->update($this->getId());
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function delete()
    {
        if ($this->user_model->exist('id = ' . $this->getId())) {
            $data['user'] = $this->user_model->findByPk($this->getId());
            $this->user_model->delete($this->getId());

            redirect(base_url() . 'user');
        } else {
            show_404();
        }
    }

}