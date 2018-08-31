<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {
	public function validate(){
		$user = array();
		$username= $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->query("SELECT * FROM `users` WHERE  `username`='$username' AND `password`='$password'");
		
		if($query->num_rows() > 0){
			$this->session->set_userdata($query->row());
		}
		return $user;
	}

	public function login(){
            $uid = 0;
            if(!empty($this->input->post('username')) && !empty($this->input->post('password'))){			
                $this->db->where('username', $this->input->post('username'));
                $this->db->where('password', $this->input->post('password'));
                $query = $this->db->get('users');
                if($query->num_rows() > 0){
                    $temp = (array)$query->row();
                    $uid = $temp['id'];
                    $this->session->set_userdata(array('uid'=>$temp['id']));
                    unset($temp['id']);
                    $this->session->set_userdata(array('userInfo'=>$temp));
                }
            }
            return $uid;		
	}
        
        public function send_reset_link($email){
            $hash = 0;
            $af_rows  = 0;
            $this->db->where('email', $email);
            $query = $this->db->get('users');
            if($query->num_rows() > 0){
                $temp = (array)$query->row();
                $uid = $temp['id'];
                $hash = md5($uid.$email);
                
                $this->db->where('email', $email);                
                $this->db->set('expiry', (time()+3600));
                $this->db->set('token', $hash);
                $this->db->update('users');
                $af_rows  = $this->db->affected_rows();
            }
            if($af_rows){
                return $hash;
            }
            else{
                return FALSE;
            }
        }
        
        public function reset_password($pass,$token){
            $ctime = time();
            $this->db->where('expiry > ', $ctime);
            $this->db->where('token', $token);
            $this->db->set('password', $pass);
            $this->db->set('expiry', time());
            $this->db->set('token', 'verified');
            $this->db->update('users');
            return $this->db->affected_rows();
        }
}