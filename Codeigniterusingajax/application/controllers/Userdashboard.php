<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Userdashboard extends CI_Controller {
    // public function __construct() {
    //     parent::__construct(); 
  
    //   $this->load->library('session');
    //   if(!$this->session->userdata('userid')){
    //   redirect(base_url('AuthController'));
    //   }

    // }

 public function dashboard()
 {
    if($this->session->userdata('userid') !=""){
    $this->load->view('dashboard');  
     }else{
    redirect(base_url('AuthController'));
  }
}
public function dashboardget() 
   {
      
       $response = array(
           'userid' => $this->session->userdata('userid'),
      
       );
       $this->load->model('AuthModel');
      $result = $this->AuthModel->userLogin($response);
      //print_r($result);die;
       if($result){
            $name=$result['name'];
           $massage = 'Inserted Successfully';
           $status=200;
           
       }
       else{
        $name=   'not failed';
           $massage = 'Faild';
           $status = 400;
       }
       $response['name'] = $name; 
    $response['massage'] = $massage; 
    $response['status'] = $status; 
    echo json_encode($response);
   }
   
}


  ?>