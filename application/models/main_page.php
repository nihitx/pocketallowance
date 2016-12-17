<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_page extends CI_Model{
    
    /**
	 * Constructor for discovery
	 * 
	 */
	function __Construct(){
		parent::__Construct();		
	}
        
        /**
	  * Function for storing the Loaners.club's invoice.
	  *  
	  * @param $data array.
	  * 
	  * @return true if successful, otherwise false.
	  */ 
        
        public function login_user($email , $password){
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            
            $result = $this->db->get('new_users');
            if($result ->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }
                
        }
        
        
        
        public function storeRegisterInfo($data){
//            print_r($data);
            $insert = $this->db->insert('new_users',$data);
           // $lastid = $this->db->insert_id(); echo $lastid; exit; 
           return $insert;
            
        }
        
        public function storeCardInfo($data){
//            print_r($data);
            $insert = $this->db->insert('user_money',$data);
           // $lastid = $this->db->insert_id(); echo $lastid; exit; 
           return $insert;
            
        }
        
        public function storeCardInfoForChildren($data){
            $insert = $this->db->insert('user_children',$data);
            return $insert;
        }
        
        public function getAllusercard($user){
        $query ='select a.name , a.email , b.*
                FROM new_users a 
                inner join user_money b
                on a.id = b.orig_id
                WHERE b.orig_id = '.$user.'
                ';
        
        $query = $this->db->query($query);
                $result = $query->result_array();
		return $result;	
                
    }
    
     public function getFamilyCard($user){
        $query ='select b.* 
                FROM new_users a 
                inner join user_children b 
                on a.id = b.orig_id 
                WHERE a.id = '.$user.' ';
        
        $query = $this->db->query($query);
                $result = $query->result();
		return $result;	
    }
    
    public function getCurrentCash($userid){
        $query = 'SELECT a.Amount from user_money a where orig_id = '.$userid.' ';
        
        $query = $this->db->query($query);
                if($query->num_rows() == 1){
                    $result = $query->result();
                    return (array)$result[0];
                }else{
                    return false;
                }
    }
    
    public function getCurrentCashOfChild( $childID, $userid ){
        $query = 'SELECT a.Amount from user_children a where a.orig_id = '.$userid.' and a.id ='.$childID.' ';
        $query = $this->db->query($query);
                if($query->num_rows() == 1){
                    $result = $query->result();
                    return (array)$result[0];
                }else{
                    return false;
                }
    }
    
    
    public function storeNewCash($newMoney , $userid){
        $whrearray = array(
                        'orig_id' => $userid,
                );    
                $updatedata = array(
                        'Amount' => $newMoney
                );      
                $this->db->where($whrearray); 
                $this->db->update('user_money', $updatedata);    
                /* Checking possible update error */
                if(!$this->db->affected_rows() == 1)
                {    
                    return false;
                }
                return true ;      
    }
    public function storeNewCashofChildren($NewCashOfChild , $userid, $childID){
        $whrearray = array(
                        'orig_id' => $userid,
                        'id ' => $childID
                );    
                $updatedata = array(
                        'amount' => $NewCashOfChild
                );      
                $this->db->where($whrearray); 
                $this->db->update('user_children', $updatedata);    
                /* Checking possible update error */
                if(!$this->db->affected_rows() == 1)
                {    
                    return false;
                }
                return true ;      
    }
    
    public function getChildName($childID , $userid){
        $query = 'SELECT children_name from user_children a where a.id = '.$childID.' and a.orig_id = '.$userid.' ';
        
        $query = $this->db->query($query);
                if($query->num_rows() == 1){
                    $result = $query->result();
                    return (array)$result[0];
                }else{
                    return false;
                }
    }
    
    public function getUserOrigIdById($userid){
        $query = 'SELECT a.orig_id from user_money a where a.id =  '.$userid.' ';
        $query = $this->db->query($query);
                if($query->num_rows() == 1){
                    $result = $query->result();
                    return (array)$result[0];
                }else{
                    return false;
                }
    }
    
}
