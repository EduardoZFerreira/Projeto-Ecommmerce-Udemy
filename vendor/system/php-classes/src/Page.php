<?php

namespace System;

use Rain\Tpl;

class Page
{
    private $tpl;
    private $options = [];
    private $defaults = [
        "data" => []
    ];

    public function __construct($opts = array())
    {
        $this->options = array_merge($this->defaults, $opts);
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . "/views/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "views-cache/"
        );
        Tpl::configure( $config );
        $this->tpl = new Tpl;
        $this->SetData($this->options["data"]);
        $this->tpl->draw("header");
    }

    private function SetData($data = array())
    {
        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function SetTpl($name, $data = array(), $returnHTML = false)
    {
        $this->SetData($data);
        return $this->tpl->draw($name, $returnHTML);
    }

    public function __destruct()
    {        
        $this->tpl->draw("footer");
    }
}