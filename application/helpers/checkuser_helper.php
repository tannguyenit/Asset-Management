<?php
defined('BASEPATH') or exit('No direct script access allowed');

function checkuser()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('arsUser')) {
        redirect('/dang-nhap.html');
    }
}