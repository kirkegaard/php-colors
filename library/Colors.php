<?php

class Colors {

    protected $_fg = array(
        'black'        => '0;30',
        'dark_gray'    => '1;30',
        'red'          => '0;31',
        'light_red'    => '1;31',
        'green'        => '0;32',
        'light_green'  => '1;32',
        'brown'        => '0;33',
        'yellow'       => '1;33',
        'blue'         => '0;34',
        'light_blue'   => '1;34',
        'purple'       => '0;35',
        'light_purple' => '1;35',
        'cyan'         => '0;36',
        'light_cyan'   => '1;36',
        'light_gray'   => '0;37',
        'white'        => '1;37',
    );

    protected $_bg = array(
        'black'      => '40',
        'red'        => '41',
        'green'      => '42',
        'yellow'     => '43',
        'blue'       => '44',
        'magento'    => '45',
        'cyan'       => '46',
        'light_gray' => '47',
    );

    protected function _getColor($str, $fg = null, $bg = null)
    {
        $colors = "";
        if(isset($this->_fg[$fg])) {
            $colors .= "\033[" . $this->_fg[$fg] . "m";
        }
        if(isset($this->_bg[$bg])) {
            $colors .= "\033[" . $this->_bg[$bg] . "m";
        }

        return $colors . $str . "\033[0m";
    }

    public function __call($fg, $args)
    {
        $bg  = isset($args[1]) ? $args[1] : null;
        $str = isset($args[0]) ? $args[0] : '';

        return $this->_getColor($str, $fg, $bg);
    }

    public static function __callStatic($fg, $args)
    {
        $bg  = isset($args[1]) ? $args[1] : null;
        $str = isset($args[0]) ? $args[0] : '';

        $c = new Colors();
        return $c->_getColor($str, $fg, $bg);
    }

}
