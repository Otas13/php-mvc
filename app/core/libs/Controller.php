<?php

namespace core\libs;

class Controller
{
    protected $template;

    public function __construct()
    {
        $this->template = new Template();
    }

    public function redirect()
    {
        $controller_folder = str_replace('index.php',"",'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);

        $params = func_get_args();
        if(isset($params[1])){
            header('Location: '.$controller_folder.$params[0].'/'.$params[1]);
        }else{
            header('Location: '.$controller_folder.$params[0]);
        }
    }

	public function model($model)
    {
        require_once '../app/models/' .$model. '.php';
        return new $model();
    }

    public function set_default_structure()
    {
        $this->template->set_default_structure();
    }

    public function set_css_files($file)
    {
        $this->template->set_css_files($file);
    }

    public function set_js_files($file)
    {
        $this->template->set_js_files($file);
    }

    public function set_page_title($name)
    {
        $this->template->set_title($name);
    }

    public function set_template($file)
    {
        $this->template->set_view($file);
    }

    public function set_var($key, $val)
    {
        $this->template->set_variable($key, $val);
    }

    public function render()
    {
       $this->template->render_page();
    }
}
