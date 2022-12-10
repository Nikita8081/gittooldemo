<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class AuthController extends CI_Controller { 
    public $Signup;

    
 
 
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct(); 
 
 
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('AuthModel');

    }
 
    public function index()  
    {  
        
        if($this->session->userdata('userid'))
         {
             redirect(base_url('UserDashboard/dashboard'));
             }
                $this->load->view('login');  
            
    }  
  
    public function signup()  
    {  
        $this->load->view('signup');  
    } 
    public function validateEmail()
    {
        $data = array(
            //'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            //'password' => $this->input->post('password')
        );
        $result = $this->AuthModel->userLogin($data);
        if($result==0)
        {
            $this->session->set_flashdata('errors', validation_errors());
        }
        else{
            echo 4;
        }
    }

    public function userSignup()
  {
       $this->form_validation->set_rules('name', 'name', 'required');
       $this->form_validation->set_rules('email', 'email', 'required');
       $this->form_validation->set_rules('password', 'password', 'required');


       if ($this->form_validation->run() == FALSE){

           $this->session->set_flashdata('errors', validation_errors());
           //redirect(base_url('signup'));
           //echo 4;
           //exit();
       }else{
        
             $response = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        
        //$this->AuthModel->insert_item('user', $data);
         //redirect(base_url());
         if($this->AuthModel->insert_item('user',$response)){
            $massage = 'Inserted Successfully';
            $status=200;
        }
        else{
            $massage = 'Faild';
            $status = 400;
        }
    }
    
   // }else{
     //   $massage='All field reqired';
       // $status=400;
     // }
    $response['massage'] = $massage; 
     $response['status'] = $status; 
     echo json_encode($response);
   }
   public function userLogin() 
   {
      $this->form_validation->set_rules('email', 'email', 'required');
      $this->form_validation->set_rules('password', 'password', 'required');


      if ($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('errors', validation_errors());
         // redirect(base_url());
      }else{
       $response = array(
           'email' => $this->input->post('email'),
           'password' => $this->input->post('password')
       );
      $result = $this->AuthModel->userLogin($response);
       if($result){
           $this->session->set_userdata('userid',$result['userid']);
         
           $massage = 'Inserted Successfully';
           $status=200;
           
       }
       else{
           $massage = 'Faild';
           $status = 400;
       }
   }
    $response['massage'] = $massage; 
    $response['status'] = $status; 
    echo json_encode($response);
}

    
function logout()
{
    $this->session->unset_userdata('userid');
    $this->session->sess_destroy();
    redirect('');
}
} 

?>

         
         