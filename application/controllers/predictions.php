<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Predictions extends CI_Controller {
	public function index(){
		//$this->load->view('prediction');
	}
	
	//getPredivtionsByMatch بتاخد الماتش اي دي وبترجع كل البريديكشنز المتعلقة بالماتش
	public function getPredictionsByMatch($match_id){
		$predictions=new prediction();
		$predictions->where("match_id",$match_id)->get();
		$firstTeam=array();
		$secondTeam=array();
		$draw=array();
		foreach($predictions as $prediction){
			if($prediction->firstScore-$prediction->secondScore > 0){
				$firstTeam[]=$prediction->stored;}
			 else if
			($prediction->firstScore-$prediction->secondScore < 0){
				$secondTeam[]=$prediction->stored;}
			 else
				$draw[]=$prediction->stored;
		}
		$data=array("firstTeam"=>$firstTeam,"secondTeam"=>$secondTeam,"draw"=>$draw);
		print_r($data);
	}
	
	/////////////////////////////////////////////////////
	// getPredictionsByMatchAndUser بتجيب البريديكشن المتعلق بيوزر وماتشي 
	public function getPredictionsByMatchAndUser($match_id,$user_id){
		$prediction=new prediction();
		$prediction->where(array("match_id"=>$match_id,"user_id"=>$user_id))->get();
			Print_r($prediction->stored);
	}
	
	////////////////////////////////////////////////////
	//setPrediction بفحص اذا كان البريديكشن موجود قبل هيك او لا , واذا اه بعدل عحسب الجديد , واذا لا بضيف بوست جديد 
	public function setPrediction($match_id,$user_id,$firstScore,$secondScore){
		$prediction=new prediction();
		$prediction->where(array("match_id"=>$match_id,"user_id"=>$user_id))->get();
		
		if($prediction->exists()){
			$prediction->firstScore=$firstScore;
			$prediction->secondScore=$secondScore;
			$prediction->save();
		}
		else{
		$prediction=new prediction();
			$prediction->match_id=$match_id;
			$prediction->user_id=$user_id;
			$prediction->firstScore=$firstScore;
			$prediction->secondScore=$secondScore;
			$prediction->save();
			
		}
	}
	
	/////////////////////////////////////////////////////
	//validate prediction بياخد ماتشي اي دي وبغير حالة الفاليديشن عحسب النتيجة
	Public function validatePredictions($match_id){
		$match=new match($match_id);
		$firstScore=$match->firstScore;
		$secondScore=$match->secondScore;
		$predictions=new prediction();
		$predictions->where("match_id",$match_id)->get();
	
		foreach($predictions as $prediction){
			if($prediction->firstScore==$firstScore && $prediction->secondScore==$secondScore)
				$prediction->status=true;
				$prediction->save();
		}
	}
	//////////////////////////////////////////////////
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */