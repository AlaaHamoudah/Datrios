<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {
	function index($id=0){		
		$team = new Team($id);
		if($team->exists())
			$this->load->view('team',array('team' => $team));
		else{
			$team->get();
			foreach($team->all as $t){
			?>
				<div class="fb-like-box" data-href="http://www.datrios.com/teams/<?php echo $t->id;?>" data-width="292" data-show-faces="true" data-stream="false" data-header="false"></div>
			<?php
			}
			?>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128609033918715";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<?php	
		}
	}
	function add(){
		$team = new Team();
		$team->name = "نادي غزة الرياضي";
		$team->description = "نادي غزة الرياضي";
		$team->picture= "http://www.admcsport.com/deployedfiles/admc-sport/site/Sports/Football/Super/images/staticfiles/_4b1c07127fde8.jpg";
		$team->save();
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */