<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 14/03/2015
 * Time: 20:28
 */

namespace src\Component\Templating;


class Smarty implements TemplatingInterface{
    private $smartyInstance;

    public function __construct()
    {
        $this->smartyInstance = new \Smarty;
        $this->smartyInstance->template_dir = '../app/View';
        $this->smartyInstance->cache_dir = '../app/View/cache';
        $this->smartyInstance->caching = $this->options();
    }

    public function render($template, $name, $string)
    {
        $this->smartyInstance->assign($name, $string);
        return $this->smartyInstance->display($template);
    }
    private function options(){
        $config  = require("../app/Config/appConfig.php");
        ($config["env"] = 'prod')? $cache = 0 : $cache = 1;

        return $cache;
    }

}