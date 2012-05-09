<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matches extends CI_Controller {
	function index($id = 0){
		$match = new Match($id);
		$match->team->get();
		$team1 = $match->team->all[0];
		$team2 = $match->team->all[1];
		$this->load->view('prediction',array(
				'match'=>$match,
				'team1'=>$team1,
				'team2'=>$team2
				)
		);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */