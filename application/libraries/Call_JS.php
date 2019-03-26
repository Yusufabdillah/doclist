<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 31/01/2019
 * Time: 14:32
 */
class Call_JS
{

    private $_CI;

    public function __construct()
    {
        $this->_CI =& get_instance();
    }

    public function helperJS($JS_Function)
    {
        return $this->_CI->load->view('helper_js/' . $JS_Function);
    }

}