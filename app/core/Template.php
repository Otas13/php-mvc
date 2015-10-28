<?php

class Template
{
    protected $variables;
    protected $view;
    protected $page_title;
    protected $css_files;
    protected $js_files;
    protected $use_default_structure;

    function __construct()
    {
        $this->variables = array();
        $this->css_files = array();
        $this->js_files = array();
        $this->page_title = 'Nepojmenovaný náhled';
        $this->use_default_structure = false;
    }

    public function set_view($view)
    {
        $this->view = $view;
    }

    public function set_variable($key,$value){
        $this->variables[$key] = $value;
    }

    public function set_default_structure()
    {
        $this->use_default_structure = true;
    }

    public function set_css_files($file)
    {
        $this->css_files = $file;
    }

    public function set_js_files($file)
    {
        $this->js_files = $file;
    }

    public function set_title($name)
    {
        $this->title = $name;
    }

    public function render_page()
    {
        extract($this->variables);
        if($this->use_default_structure == true){
        require_once '../public/templates/default_header.php';}
        require_once '../app/views/'.$this->view. '.php';
        if($this->use_default_structure == true){
        require_once '../public/templates/default_footer.php';}
    }
}
