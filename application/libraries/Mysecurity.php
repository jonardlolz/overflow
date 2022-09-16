<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mysecurity{
	private $secret;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('encryption');
		// $this->ci->load->library('encrypt');
		$this->secret = $this->ci->encryption;
		// $this->secret2 = $this->ci->encrypt;
	}

	public function encrypt_url($key){
		return str_replace(array('+', '/', '='), array('-', '_', '~'), $this->secret->encrypt($key));
	}

	public function decrypt_url($key){
		return $this->secret->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $key));
	}
}
?>
