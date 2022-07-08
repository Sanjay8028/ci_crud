<?php
class loginmodel extends CI_Model
{
   
   function insert_data($username,$password,$firstname,$lastname,$email)
   {
   $query=$this->db->query("select * from users where (usename='".$username."' or password='".$password."')");
      $row = $query->num_rows();
      if($row)
      {
      $data['message']="<h3 style='color:red'>This user already registered</h3>";
      }
      else
      {
      $query=$this->db->query("insert into users set username='$username',password='$password',firstname='$firstname',lastname='$lastname',email='$email'");

      $data['message']="<h3 style='color:blue'>You are registered successfully</h3>";
      }

      $this->load->view('register',@$data);
   }

   
<?php
// error_reporting(0);
class Users extends MY_controller
 {
  public function __construct()
  {
  parent::__construct();
  $this->load->database();
  $this->load->helper('url');
  $this->load->model('loginmodel'); ///load model
  }

  public function index()
  {

    if($this->input->post('submit'))
    {
    $username=$this->input->post('username');
    $password=$this->input->post('password');
    $firstname=$this->input->post('firstname');
    $lastname=$this->input->post('lastname');
     $email=$this->input->post('email');

    $this->loginmodel->insert_data($username,$password,$firstname,$lastname,$email);

  }else{
  $this->load->view('register');
  }
  

?>