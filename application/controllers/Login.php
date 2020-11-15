<?php
class Login extends CI_Controller{
    public $model = NULL;

    public function __construct(){
        parent::__construct();
        $this->load->model('Loginmodel');
        $this->model = $this->Loginmodel;

        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index(){
        if(isset($_POST['login'])){
            $this->model->username = $_POST['username'];
            $this->model->password = $_POST['password'];
            if ($this->model->cek_log()==TRUE) {
                $this->session->set_userdata('username', $this->model->username);
                 $this->session->set_userdata('id', $this->model->id_pelanggan);
                redirect('Masuk');
                //$this->load->view('v_admin', ['model'=>$this->model]);
            }
            else{
                $this->model->notif = "Username dan Password Salah !!!";
                $this->load->view('welcome_message', ['model'=>$this->model]);
                
            }
        }else{
            $this->load->view('welcome_message', ['model'=>$this->model]);
        }
    }


    public function logout(){
        if ($this->session->has_userdata('username')) {
            $this->session->sess_destroy();
            $this->load->view('welcome_message');
        }
    }
}
?>
