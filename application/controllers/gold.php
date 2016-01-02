<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gold extends CI_Controller {
	public function index() {
		if(! $this->session->userdata('gold_count'))
		{
			$this->session->set_userdata('gold_count', 0); 
			$this->session->set_userdata('log', array());
		}
		$this->load->view('index');
	}
	public function process_money() {
		// set local array to store messages
		$log = $this->session->userdata('log'); 
		if($this->input->post('destination') == "farm")
		{
			$gold = rand(10,20);
			$gold_count = $this->session->userdata("gold_count"); 
			$this->session->set_userdata('gold_count', $gold_count + $gold);
			$log[] = "<p class='g'>You earned $gold coins!  (". date('o/m/t  h:i:s A') .")</p>";
			$this->session->set_userdata('log', $log);	
		}
		if($this->input->post("destination") == "cave")
		{
			$gold = rand(5,10);
			$gold_count = $this->session->userdata("gold_count"); 
			$this->session->set_userdata('gold_count', $gold_count + $gold);
			$log[] = "<p class='g'>You earned $gold coins!  (". date('o/m/t  h:i:s A') .")</p>";
			$this->session->set_userdata('log', $log);
		}
		if($this->input->post("destination") == "house")
		{
			$gold = rand(2,5);
			// increment the gold count the by the $gold value
			$gold_count = $this->session->userdata("gold_count"); 
			$this->session->set_userdata("gold_count", $gold_count + $gold);
			$log[] = "<p class='g'>You earned $gold coins!  (". date('o/m/t  h:i:s A') .")</p>";
			$this->session->set_userdata('log', $log);
		}
		if($this->input->post('destination') == "casino")
		{
			$gold = rand(-50,50); 
			$gold_count = $this->session->userdata('gold_count');
			if($gold > 0)
			{
				$x = 'g';
				$this->session->set_userdata('gold_count', $gold_count + $gold);
			}
			else 
			{
				$x = 'r';
				$this->session->set_userdata('gold_count', $gold_count + $gold);
			}
			$log[] = "<p class= $x >You earned $gold coins!  (". date('o/m/t  h:i:s A') .")</p>";
			$this->session->set_userdata('log', $log);
		}
		if($this->session->userdata('gold_count') > 200)
		{
			$this->session->unset_userdata('gold_count'); 
			$this->session->set_userdata('gold_count', 0);
			$this->session->set_userdata('winner', 1);  
		}
		redirect('/');
	}
}