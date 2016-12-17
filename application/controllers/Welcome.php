<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
  public function __construct(){
  parent::__construct();
  $this->load->library('javascript');
  $this->load->library('form_validation');
  $this->load->library('email');
  $this->load->library('session');
  $this->load->helper('url');
  
}

	public function index()
	{       
                $this->load->helper('url');
                $this->load->view('header_view');
                $this->load->view('body_view');
                $this->load->view('footer_view');
                
            }
        public function login(){
            $this->load->helper('form');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
                
                if ($this->form_validation->run() == FALSE){
                    $this->load->view('header_view');
                $this->load->view('body_view');
                $this->load->view('footer_view');
                }else{
                     
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    
                    $this->load->model('main_page');
                   $user_id =  $this->main_page->login_user($email, $password);
                    if($user_id){
                        $this->session->set_userdata(array(
                            'user_id' => $user_id,
                            'email' => $email,
                            'loggedin' => true
                        ));
                      
                        
                      $this->session->set_flashdata('loggedin_success','you are loggedin');
                    
                        redirect('welcome/Admin');
                        
                    }else{
                        
                         redirect('welcome/login');
                    }
                    
                }
            
        }
        public function register(){
                $this->load->helper('url');
                $this->load->helper('form');
                
                $this->load->view('header_view');
                $this->load->view('register_view');
                $this->load->view('footer_view');
            
        }
        public function Admin(){
           
        if (!$this->session->userdata('user_id'))
        {
            redirect('welcome'); // the user is not logged in, redirect them!
        }
                $this->load->helper('url');
                $this->load->view('header2_view');
                $this->load->view('admin_view');
                $this->load->view('footer_view');
        }
        
        public function insertInformation(){
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[new_users.email]');
                $this->form_validation->set_rules('phone', 'Phone', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required|matches[password]');
                
               
                if ($this->form_validation->run() == FALSE){
                $this->load->view('header_view');
                $this->load->view('register_view');
                $this->load->view('footer_view');
                }else{

                    $data =  array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'password' => $this->input->post('password')

                    );

                    $this->load->model('main_page');
                    $foo =  $this->main_page->storeRegisterInfo($data);   
                
                    if($foo){
                        $this->newRegisteredUser();
                    }else{
                        return false;
                    }
                }

        }
        
        public function newRegisteredUser(){
            $this->load->view('header_view');
            $this->load->view('new_user_congrats_view');
            $this->load->view('footer_view');
        }
        
        
        public function userCardRegister(){
            if (!$this->session->userdata('user_id'))
        {
            redirect('welcome'); // the user is not logged in, redirect them!
        }
            $this->load->view('header2_view');
            $this->load->view('user_card_register_view');
            $this->load->view('footer_view');
            
        }
        public function userCardChildrenRegister(){
            if (!$this->session->userdata('user_id'))
        {
            redirect('welcome'); // the user is not logged in, redirect them!
        }
            $this->load->view('header2_view');
            $this->load->view('children_card_register_view');
            $this->load->view('footer_view');
        }
        
        public function insertUserCard(){
            if (!$this->session->userdata('user_id'))
        {
            redirect('welcome'); // the user is not logged in, redirect them!
        }
            
             $this->load->helper('form');
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('cardname', 'CardName', 'required');
                $this->form_validation->set_rules('iban', 'IBAN', 'required');
                $this->form_validation->set_rules('cc', 'CC', 'required|max_length[4]');
                $this->form_validation->set_rules('amount', 'Amount', 'required');
                
                if ($this->form_validation->run() == FALSE){
                $this->load->view('header2_view');
                $this->load->view('user_card_register_view');
                $this->load->view('footer_view');
                }else{
                    
                   
                    $data =  array(
                    'card_type' => $this->input->post('cardname'),
                    'iban' => $this->input->post('iban'),
                    'cc' => $this->input->post('cc'),
                    'amount' => $this->input->post('amount'),
                     
                    'orig_id' => $this->session->userdata('user_id')

                );


                    $this->load->model('main_page');
                   $this->main_page->storeCardInfo($data);
                   
                   redirect('welcome/Admin');
                    
                }
                
            
        }
        
        public function addUserCash(){
            if (!$this->session->userdata('user_id')){
                redirect('welcome'); // the user is not logged in, redirect them!
            }
                $userid = $this->session->userdata('user_id');
                $data = array(
                    'user_id' => $userid
                );
                $this->load->view('header2_view');
                $this->load->view('add_user_cash_view', $data  );
                $this->load->view('footer_view');
            
        }
        
        public function addCashToUserAcc(){
            if (!$this->session->userdata('user_id')){
                redirect('welcome'); // the user is not logged in, redirect them!
            }
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('amount', 'Amount', 'required');
                
                if ($this->form_validation->run() == FALSE){
                $this->load->view('header2_view');
                $this->load->view('add_user_cash_view');
                $this->load->view('footer_view');
                }else{
                    
                    $userid  = $this->session->userdata('user_id');
                    
                    $this->load->model('main_page');
                    $currentCash = $this->main_page->getCurrentCash($userid);
                    
                   $newMoney1 = $this->input->post('amount');
                   $newMoney2 = $currentCash['Amount'];
                   $newMoney = $newMoney1 + $newMoney2 ;
                   
                   $this->load->model('main_page');
                   $this->main_page->storeNewCash($newMoney , $userid);
                   
                   redirect('welcome/Admin');
                   
                }
                
                
            
        }
        
        public function insertUserChildrenCard(){
            if (!$this->session->userdata('user_id'))
        {
            redirect('welcome'); // the user is not logged in, redirect them!
        }
            $this->load->helper('form');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('daugtherOrSon', 'daughterson', 'required');
                $this->form_validation->set_rules('iban', 'IBAN', 'required');
                $this->form_validation->set_rules('cc', 'CC', 'required|max_length[4]');
                $this->form_validation->set_rules('amount', 'Amount', 'required');
                
                if ($this->form_validation->run() == FALSE){
                $this->load->view('header2_view');
                $this->load->view('children_card_register_view');
                $this->load->view('footer_view');
                }else{
                    
                   $userid  = $this->session->userdata('user_id');
                    
                    $this->load->model('main_page');
                    
                    $NewAmount = $this->input->post('amount');
                    
                    // method for deducting cash of user ...
                    $currentCashOfUser = $this->main_page->getCurrentCash($userid);
                    //var_dump($currentCashOfUser);
                    $newMoney = $currentCashOfUser['Amount'] - $NewAmount;
                   //var_dump($newMoney);
                   $this->main_page->storeNewCash($newMoney , $userid);
                   
                   
                    $data =  array(
                    'daugther_son' => $this->input->post('daugtherOrSon'),
                    'children_name' => $this->input->post('name'),
                    'iban' => $this->input->post('iban'),
                    'cc' => $this->input->post('cc'), 
                    'amount' => $NewAmount, 
                    'orig_id' => $this->session->userdata('user_id')

                );


                    $this->load->model('main_page');
                   $this->main_page->storeCardInfoForChildren($data);
                   
                   redirect('welcome/Admin');
                    
                }
        }
        
        public function addUserChildrenCash($childID){
            if (!$this->session->userdata('user_id')){
                redirect('welcome'); // the user is not logged in, redirect them!
            }
            
                $userid= $this->session->userdata('user_id');
                $this->load->model('main_page');
                $childname =  $this->main_page->getChildName($childID, $userid);
                
                $data = array(
                    'name' => $childname['children_name'],
                    'childID'=> $childID
                );
                $this->load->view('header2_view');
                $this->load->view('add_user_children_cash_view' , $data);
                $this->load->view('footer_view');
            
        }
        
        public function addCashToUserChildAcc($childID){
            if (!$this->session->userdata('user_id')){
                redirect('welcome'); // the user is not logged in, redirect them!
            }
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('amountofchild', 'Amount', 'required');
                
                if ($this->form_validation->run() == FALSE){
                    
                $userid= $this->session->userdata('user_id');
                $this->load->model('main_page');
                $childname =  $this->main_page->getChildName($childID, $userid);
                $data = array(
                    'name' => $childname['children_name'],
                    'childID'=>$childID
                );
                $this->load->view('header2_view');
                $this->load->view('add_user_children_cash_view', $data);
                $this->load->view('footer_view');
                
                
                }else{
                    
                    $userid  = $this->session->userdata('user_id');
                    
                    $this->load->model('main_page');
                    // method for adding childrens money...
                    $GivingAmount = $this->input->post('amountofchild');
                    $CurrentCashOfChild = $this->main_page->getCurrentCashOfChild($userid ,$childID);
                   // var_dump($CurrentCashOfChild);
                    $NewCashOfChild = $GivingAmount + $CurrentCashOfChild['Amount'];
                    //var_dump($NewCashOfChild);
                    $this->main_page->storeNewCashofChildren($NewCashOfChild , $userid , $childID);
                    
                    // method for deducting cash of user ...
                    $currentCashOfUser = $this->main_page->getCurrentCash($userid);
                    //var_dump($currentCashOfUser);
                    $newMoney = $currentCashOfUser['Amount'] - $GivingAmount;
                   //var_dump($newMoney);
                   $this->main_page->storeNewCash($newMoney , $userid);
                   
                   redirect('welcome/Admin');
                   
                }
        }
        public function takeAway($childID){
            if (!$this->session->userdata('user_id')){
                redirect('welcome'); // the user is not logged in, redirect them!
            }
                $userid= $this->session->userdata('user_id');
                $this->load->model('main_page');
                    // method for adding childrens money...
                $CurrentCashOfChild = $this->main_page->getCurrentCashOfChild($childID,$userid);
                $data = array(
                  'childscash' => $CurrentCashOfChild['Amount'],
                   'childID' => $childID
                );
                $this->load->view('header2_view');
                $this->load->view('take_away_child_money',$data);
                $this->load->view('footer_view');
            
        }
        
        public function takeAwayCashFromChild($childID){
            if (!$this->session->userdata('user_id')){
                redirect('welcome'); // the user is not logged in, redirect them!
            }
                $this->load->helper('form');
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('amountofchild', 'Amount', 'required');
                
                if ($this->form_validation->run() == FALSE){
                $userid= $this->session->userdata('user_id');
                $this->load->model('main_page');
                    // method for adding childrens money...
                $CurrentCashOfChild = $this->main_page->getCurrentCashOfChild($childID,$userid );
                
                $data = array(
                  'childscash' => $CurrentCashOfChild['Amount'],
                   'childID' => $childID
                );
                $this->load->view('header2_view');
                $this->load->view('take_away_child_money',$data);
                $this->load->view('footer_view');
                }else{
                    
                    $userid  = $this->session->userdata('user_id');
                    
                    $this->load->model('main_page');
                    // method for substracting childrens money...
                    $TakingAmount = $this->input->post('amountofchild');
                    $CurrentCashOfChild = $this->main_page->getCurrentCashOfChild($childID,$userid);
                   // var_dump($CurrentCashOfChild);
                    $NewCashOfChild = $CurrentCashOfChild['Amount'] - $TakingAmount  ;
                    //var_dump($NewCashOfChild);
                    $this->main_page->storeNewCashofChildren($NewCashOfChild , $userid ,$childID);
                    
                    // method for deducting cash of user ...
                    $currentCashOfUser = $this->main_page->getCurrentCash($userid);
                    //var_dump($currentCashOfUser);
                    $newMoney = $currentCashOfUser['Amount'] + $TakingAmount;
                   //var_dump($newMoney);
                   $this->main_page->storeNewCash($newMoney , $userid);
                   
                   redirect('welcome/Admin');
                   
                }
        }
        

        public function cardInfo(){
            $user = $this->session->userdata('user_id');
            $this->load->model('main_page');
            $result = $this->main_page->getAllusercard($user);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
        }
        
        public function childrenCardInfo(){
            $user = $this->session->userdata('user_id');
            $this->load->model('main_page');
            $result = $this->main_page->getFamilyCard($user);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
        }
    
    public function logout(){
                $this->session->set_userdata('logged_in', FALSE);
                $this->session->sess_destroy();
                redirect('welcome');
        }
}
