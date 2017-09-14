<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/11/2017
 * Time: 4:28 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function className()
    {
        return get_called_class();
    }

    public static function getProperties()
    {
        return get_class_vars(static::className());
    }

    public function getPk()
    {
        return 'id';
    }

    public function exist($params)
    {
        $query = $this->db->query('SELECT COUNT(*) as count FROM ' . $this->tableName() . ' WHERE ' . $params);
        return (int) $query->row()->count;
    }
}