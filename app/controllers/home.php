<?php

use core\libs\Controller;

class Home extends Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index($name = '')
    {

        $this->set_template('home/index');
        $this->set_var('test','OK!');
            $this->set_default_structure();
            $this->set_page_title('Domovská stránka');
        $this->render();
    }
}
