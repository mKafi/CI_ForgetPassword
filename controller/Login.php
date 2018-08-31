<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	   	$this->load->model('Model_login');
	}

	public function index(){		
		if(!empty($this->session->userdata('uid'))){
			redirect('dashboard');
		}
		else{
			if($this->input->post()){
				if($this->Model_login->login()){
					redirect('dashboard');
				}
			}
			$this->load->view("portal/login_view");
		}
	}
        
        
        public function reset_password(){
            $this->data['title'] = "Reset Password";            
            $vars_forget_pass = array(
                'title' => $this->data['title']
            );

            if(!empty($this->input->post('forgot-pass'))){
                unset($_POST['submit']);
                unset($_POST['csrftoken']);
                $email = $this->input->post('forgot-pass');
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $flag = $this->Model_login->send_reset_link($email);                
                    if($flag){
                        $link = base_url().'reset-pass/'.$flag;
                        $subject = 'Password reset link';
                        $message = "Dear User,\r\n".PHP_EOL;
                        $message .= "Your reset link <a href=".$link.">".$link."</a>\r\n".PHP_EOL;
                        $message .= "Thank you\r\n".PHP_EOL;

                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        // More headers
                        $headers .= 'From: <webmaster@example.com>' . "\r\n";
                        mail($email,$subject,$message,$headers);                    
                        $this->session->set_flashdata('action_flash', 'Password reset link sent successfully.');
                        redirect('reset-password');
                    }
                }
            }

            //$this->data['content'] = $this->load->view("portal/forget_password", $vars_forget_pass, true);
            $this->load->view("portal/forget_password", $this->data);
        }

        public function set_password($token){
            $this->data['title'] = "Enter new password";            
            $vars_forget_pass = array(
                'title' => $this->data['title']
            );        
            if(!empty($this->input->post('new-pass'))){
                unset($_POST['submit']);
                unset($_POST['csrftoken']);
                if($this->input->post('new-pass') == $this->input->post('re-pass')){                
                    $flag = $this->Model_login->reset_password($this->input->post('re-pass'),$token);
                    if($flag){
                        $this->session->set_flashdata('action_flash', 'Password has been set successfully');                    
                    }
                    else{
                        $this->session->set_flashdata('danger_flash', 'Something went wrong. Please contact with administrator');
                    }
                    redirect('login');
                }
                else{
                    $this->session->set_flashdata('action_flash', 'Entered password does not matched'); 
                    redirect('reset-pass/'.$token);
                }

            }
            //$this->data['content'] = $this->load->view("", $vars_forget_pass, true);
            $this->load->view("portal/enter_password", $this->data);
        }
}