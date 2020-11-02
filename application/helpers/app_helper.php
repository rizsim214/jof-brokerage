<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getProcessor($id){
    $CI = get_instance();
    $CI->load->model('AdminModel');

    return $CI->AdminModel->getProcessor($id);

}
