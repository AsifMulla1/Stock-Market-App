<?php
class Login_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

        public function AdminLogin($username,$password)
        {
            $this->db->select('username,password,loginId');
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query=$this->db->get('login_master');
              if($query->num_rows()>0)
                {
                    return $query->result(); 
                }
              else
                {
                    return false;
                }

        }

        public function getallUser()
        {
          $this->db->select('login_master.*');
          $this->db->from('login_master');
          $this->db->where('login_master.is_active','1');
          $query=$this->db->get();
          return $query->result();
        }
	
	

    

    

		
    
  }
?>

