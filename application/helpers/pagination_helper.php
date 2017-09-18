<?php
/**
 * Created by PhpStorm.
 * User: ValehA
 * Date: 9/18/2017
 * Time: 1:55 PM
 */

defined('BASEPATH') || exit('No direct script access allowed');


if (!function_exists('pagination')) {

    function pagination($totalRows, $perPage, $baseUrl = null, $uriSegment = 3)
    {
        $ci =& get_instance(); // base codeigniter obyektinden miras alindi

        if (is_null($baseUrl)) {
            $segment[] = $ci->router->class;
            $segment[] = $ci->router->method;
            $baseUrl = implode('/', $segment);
        }
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config['uri_segment'] = $uriSegment;
        $config['base_url'] = site_url($baseUrl);

        $ci->load->library('pagination');

        $ci->pagination->initialize($config);

        return $ci->pagination->create_links();
    }

}