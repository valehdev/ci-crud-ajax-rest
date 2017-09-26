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
    private $limit = 10;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'model');
    }


    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('user/index');
        $this->load->view('layout/footer');
    }

    public function index_json()
    {
        echo json_encode($this->model->all());
    }

    public function view()
    {
        $this->load->view('layout/header');
        $this->load->view('user/view');
        $this->load->view('layout/footer');
    }

    public function view_json()
    {
        $result = $this->model->findByPk($this->getId());
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
        $this->model->rules();
        $msg['success'] = false;
        $msg['type'] = 'create';
        if ($this->form_validation->run()) {
            $this->model->create();
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
        $msg['success'] = false;
        $result = $this->model->delete($this->getId());

        if ($result) {
            $msg['success'] = true;
        }

        echo json_encode($msg);
    }


    public function paginationAjax()
    {
        $response = $this->model->all($this->getPaginationLimit());
        $totalRows = $this->model->count();

        $this->load->helper('pagination');
        $pageLinks = pagination($totalRows, $this->getPaginationLimit());

        if (!$this->input->is_ajax_request()) $this->load->view('layout/header');
        $this->load->view('user/ajax', compact('pageLinks'));
        if (!$this->input->is_ajax_request()) $this->load->view('layout/footer');
    }

}