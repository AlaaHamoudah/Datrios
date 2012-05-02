<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $user;
	public $fb;
	
	function __construct() {
		parent::__construct();
		
		$fbconf = array(
		  'appId'  => '128609033918715',
		  'secret' => '92d52e85e62db95c4a2619805d1ef5d7',
		);
		$this->load->library('facebook',$fbconf);
		
		$this->fb = new Facebook($fbconf);
		$this->user = $this->fb->getUser();
		
		$this->template->set_layout('default');
		$this->template->title('Social Sport Show','Index');
		$this->template->append_metadata('<link href="css/sss.css" rel="stylesheet" type="text/css" media="screen" />');
		$this->template->append_metadata('<meta property="fb:app_id"      content="128609033918715" />');
		
		$this->header();
		$this->template->set_partial('footer','footer');
		
	}
	
	function header(){
		
		$m = $this->router->method;
		$nav = array(
			array('id' => 1, 'class' => ($m == 'index')?'active':'', 'href' => base_url(), 'name' => 'Home'),
			array('id' => 2, 'class' => ($m == 'profile')?'active':'','href' => site_url('index/profile'), 'name' => 'Services'),
			array('id' => 3, 'class' => ($m == 'tour')?'active':'','href' => site_url('index/tour'), 'name' => 'Clients'),
			array('id' => 4, 'class' => ($m == 'notification')?'active':'','href' => site_url('index/notification'), 'name' => 'About'),
		);
		
		if($this->user){
			$logoutUrl = $this->fb->getLogoutUrl();
			$nav[] = array('id' => 6, 'class' => ($m == 'login')?'active':'','href' => $logoutUrl, 'name' => 'Contact');
		}else{
			$loginUrl = $this->fb->getLoginUrl(array('scope'=>array('offline_access,email,publish_actions,publish_stream')));
			$nav[] = array('id' => 5, 'class' => ($m == 'logout')?'active':'','href' => $loginUrl, 'name' => 'Contact');
		}
		
		$data = array(
			'title' => 'Paperlike',
			'desc' => 'Template design by <a href="'.base_url().'"> CSS Templates</a>',
			'nav' => $nav
		);
		$this->template->set_partial('header','header',$data);
	}
	
	
}



class MY_Admin extends MY_Controller {

	public $title = "";
	public $model = "";
	
	public $objects;
	public $cols = array();
	public $form_cols = array();
	
	function __construct() {
		parent::__construct();
       
		
   }

	public function get_object($page,$per_page){
		$this->objects = new $this->model();
		$this->objects->get_paged($page,$per_page);
	}
	
	public function view()
	{
		$uri = $this->uri->uri_to_assoc(4);
		
		$page = 1;
		$per_page = 10;
		extract($uri);
		
		$this->get_object($page,$per_page);
		
		/// urls ///
		$admin_url = site_url('admin');
		$current_url = $admin_url.$this->uri->slash_segment(2,'both');
		
		/// paged ///
		$uri['page'] = 1;
		$this->objects->paged->first_url = $current_url.'view/'.$this->uri->assoc_to_uri($uri);
		$uri['page'] = $this->objects->paged->previous_page;
		$this->objects->paged->previous_url = $current_url.'view/'.$this->uri->assoc_to_uri($uri);
		$uri['page'] = $this->objects->paged->next_page;
		$this->objects->paged->next_url = $current_url.'view/'.$this->uri->assoc_to_uri($uri);
		$uri['page'] = $this->objects->paged->total_pages;
		$this->objects->paged->last_url = $current_url.'view/'.$this->uri->assoc_to_uri($uri);
		
		
		//$this->template->set_partial('footer','head');
		
		
		$this->template->build('admin/list', array(
			'objects' => $this->objects->all,
			'paged' => $this->objects->paged,
			'admin_url' => $admin_url,
			'current_url' => $current_url,
			'cols' => $this->cols
		));
	}
	
	public function form($id = 0)
	{
		$this->objects = new $this->model($id);

		$form = $this->objects->render_form(
			$this->form_cols
			,'admin'.$this->uri->slash_segment(2,'both').'add/'.$this->objects->id
		);
		
		$this->template->build('admin/form', array('form' => $form) );
	}
	
	function add($id = 0){
		$this->objects = new $this->model($id);
		$save = $this->objects->from_array($_POST,$this->add_cols(),TRUE);
		
		if(!$save){
			echo $c->error->string;
		}
		else
			redirect('admin'.$this->uri->slash_segment(2,'both').'view/');
	}
	
	function delete($id){
		$this->objects = new $this->model($id);
		echo $this->model;
		if(!$this->objects->delete()){
			echo $c->error->string;
		}
		else
			redirect('admin'.$this->uri->slash_segment(2,'both').'view/');
	}
	
	function add_cols(){
		$cols = array();
		foreach($this->form_cols as $key => $value){
			if(is_int($key))
				$cols[] = $value;
			else
				$cols[] = $key;
		}
		return $cols;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */