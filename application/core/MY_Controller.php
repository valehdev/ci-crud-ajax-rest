<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/11/2017
 * Time: 4:28 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    private $segment = 3;
    private $limit = 10;

    public function getId()
    {
        return $this->uri->segment($this->segment);
    }

    public function getPaginationLimit()
    {
        return $this->limit;
    }

}