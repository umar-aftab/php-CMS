<?php

class lang {

    private $lang = null;

    function __construct($lang) {
        $this->lang = parse_ini_file("{$lang}.ini");
    }


    public function xlate($str) {

        $arg_count = func_num_args();

        if ($arg_count > 1) {
            $params = func_get_args();

            // strip first arg
            array_shift($params);
        } else {
            $params = array();
        }

        $out_str = isset($this->lang[$str]) ? $this->lang[$str] : null;

        if (!$out_str) {
            throw new exception("Lang String Not Found: $str");
        }

        return vsprintf($out_str, $params);
    }
}

?>