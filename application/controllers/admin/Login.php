<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
      $data = [];
    // if (isset($_SESSION['user_id'])) {
    //     redirect('admin/dashboard');            
    // }else if(empty($_SESSION['user_id'])){
    //     $data['error'] = " ";
    //     $this->load->view('adminpanel/login',$data);            
    // } 
    if(empty($email) || empty($password)){
        $data['error'] = " ";
        $this->load->view('adminpanel/login',$data);  
    } 

  }
  public function form_validation()
  {
        // print_r($_POST); die();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $e = $this->db->query("SELECT `email` FROM `backenduser`");
    $pass = $this->db->query("SELECT `password` FROM `backenduser`");

    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[6]|max_length[9]');
    if ($this->form_validation->run() == FALSE)
    {
        $data = [];
        $data['error'] = " ";
        $this->load->view('adminpanel/login',$data);
    }elseif($e != $email || $password != $pass){
          $data = [];
          $data['error'] = "Your email and password does not match";
          $this->load->view('adminpanel/login',$data);
    }
    
        // echo "Validaton True. You can proceed";

        $query = $this->db->query("SELECT * FROM `backenduser` WHERE `email`='$email' AND `password`='$password'");
        // print_r($query);
        if($query->num_rows()){
            $result = $query->result_array();
            // echo "<pre>";
            // print_r($result); die();
            // $this->load->library('session'); //or in autoload.php
            $this->session->set_userdata('user_id',$result[0]['uid']);
            // $this->session->set_userdata('username', $result[0]['username']);

            redirect('admin/dashboard');
        }
  }
  public function logout(){
        session_destroy();
        redirect('admin/login');
    }
}
