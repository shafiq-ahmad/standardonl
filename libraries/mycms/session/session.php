<?php
defined('_MEXEC') or die ('Restricted Access');

class Session {
	private $logged_in=false;
	public $user_id;
	public $user_name;
	public $full_name;
	public $admin;
	
	function __construct() {
		session_start();
		$this->check_login();
		if($this->logged_in) {
		  // actions to take right away if user is logged in
		} else {
		  // actions to take right away if user is not logged in
		}
	}
	
  public function is_logged_in() {
    return $this->logged_in;
	}
	
  public function getAdminType() {
	$admin='';
	if (isset($_SESSION['admin'])){
		$this->admin=$admin=$_SESSION['admin'];
	}
    return $admin;
	}

	public function login($user,$admin='') {
	// database should find user based on username/password
	if($user){
		$this->user_id = $_SESSION['user_id'] = $user[0]['id'];
		$this->user_name = $_SESSION['username'] = $user[0]['login_name'];
		$this->full_name = $_SESSION['fullname'] = $user[0]['name'];
		$this->admin = $_SESSION['admin'] = $admin;
		$this->logged_in = true;
	}
  }
  
  public function logout() {
    if(isset($_SESSION['user_id'])){ unset($_SESSION['user_id']);}
    unset($this->user_id);
	unset($this->user_name);
	if(isset($_SESSION['username'])){ unset($_SESSION['username']);}
	unset($this->full_name);
	if(isset($_SESSION['fullname'])){ unset($_SESSION['fullname']);}	
	unset($this->admin);
	if(isset($_SESSION['admin'])){ unset($_SESSION['admin']);}
    $this->logged_in = false;
  }

	private function check_login() {
    if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['fullname']) && isset($_SESSION['admin'])) {
      if ($_SESSION['admin'] == _ADMIN){
		  $this->user_id = $_SESSION['user_id'];
		  $this->user_name = $_SESSION['username'];
		  $this->full_name = $_SESSION['fullname'];
		  $this->logged_in = true;
	  }
    } else {
      unset($this->user_id);
      unset($this->user_name);
      unset($this->full_name);
      $this->logged_in = false;
    }
  }
  
	public static function setMessages($msg){
		if(is_array($msg)){
			$_SESSION['messages']=$msg;
		}else{
			$messages=array();
			if (isset($_SESSION['messages'])){$messages = $_SESSION['messages'];}
			$messages[]=$msg;
			$_SESSION['messages']=$messages;
		}
	}

	public static function getMessages(){
		if(isset($_SESSION['messages'])) {
			$messages = array();
			$messages = $_SESSION['messages'];
			unset($_SESSION['messages']);
			return $messages;
		}
		return false;
	}
	
	
}
$session = new Session();


?>
