<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
    $this->load->view('adminpanel/register');

     // $this->load->helper(array('form', 'url'));

    // $this->load->library('form_validation');
    // $this->form_validation->set_rules('username', 'Username', 'required');
    // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    // $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[6]|max_length[9]');
    // // $this->form_validation->set_rules('cpassword', 'Confirm password', 'required|alpha_numeric|min_length[6]|max_length[9]');

    // if ($this->form_validation->run() == FALSE)
    // {
    //     $this->load->view('adminpanel/register');
    // }
    // else
    // {
    //     echo "Validaton True. You can proceed";
    // }
  }
  public function register_account(){
     // $this->load->helper(array('form', 'url'));

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[6]|max_length[9]');
    // $this->form_validation->set_rules('cpassword', 'Confirm password', 'required|alpha_numeric|min_length[6]|max_length[9]');

    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('adminpanel/register');
    }
    else
    {
        // echo "Validaton True. You can proceed";
        echo $username = $_POST['username'];
        echo $email = $_POST['email'];
        echo $password = $_POST['password'];
        // die();

        $query = $this->db->query("INSERT INTO `backenduser`( `username`, `email`, `password`) VALUES ('$username','$email','$password')");

        if($query){
            $this->session->set_flashdata('inserted', 'yes');
            redirect('admin/login');
        }else{
            $this->session->set_flashdata('inserted', 'no');
            redirect('admin/register');
        }
    }
  }
}
