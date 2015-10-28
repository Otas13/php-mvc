<?php

class Admin extends Controller
{
    protected $admin;

    function __construct() {
        parent::__construct();
        $this->admin = $this->model('Admin_model');
    }

    /*
        hlavni strana s kontrolou prihlaseni
    */
    public function index()
    {
        if(!$this->admin->verify_login()){
           $this->login();
            return;
       }

        $this->set_template('admin/index');
        $this->set_default_structure();
        $this->set_page_title('Administrace - home');
        $this->set_var('welcome', $_SESSION['nick']);
        $this->render();
    }

    /*
        prihlasovaci stranka
    */
    public function login()
    {
        $this->set_template('admin/login');
        $this->render();

    if(isset($_POST['logon'])){

        if($this->admin->login_submit($_POST))
        {
            $this->redirect('admin');
        }else{
            #refresh pro ostraneni $POST
            echo 'Neplatny login ';
        }
    }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('admin');
    }
}
