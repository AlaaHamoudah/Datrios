<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index(){
	echo "hello";
	}
	public function add(){
	//defining team real Madrid
	$team=new team();
	$team->name="Real Madrid";
	//adding players
	$p1=new player();
	$p1->name="Iker Casillas";
	
	$p2=new player();
	$p2->name="Pepe";
	
	$p3=new player();
	$p3->name="Sergio Ramos";
	
	$p4=new player();
	$p4->name="Marcelo";
	
	$p5=new player();
	$p5->name="Arbeloa";
	
	$p6=new player();
	$p6->name="Xabi Alonso";
	
	$p7=new player();
	$p7->name="Sami Khedira";
	
	$p8=new player();
	$p8->name="Mesut Özil";
	
	$p9=new player();
	$p9->name="	Kaká";
	
	$p10=new player();
	$p10->name="Cristiano Ronaldo";
	
	$p11=new player();
	$p11->name="Karim Benzema";
	$p1->save();
	$p2->save();
	$p3->save();
	$p4->save();
	$p5->save();
	$p6->save();
	$p7->save();
	$p8->save();
	$p9->save();
	$p10->save();
	$p11->save();
	$team->save(array($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11));
	/////////////////////////////////////////////////////////////////////////////////////
	//defining FCB
	$team1=new team();
	$team1->name="FCB";
	//adding players
	$p1=new player();
	$p2=new player();
	$p3=new player();
	$p4=new player();
	$p5=new player();
	$p6=new player();
	$p7=new player();
	$p8=new player();
	$p9=new player();
	$p10=new player();
	$p11=new player();
	
	$p1->name="Víctor Valdés";
	$p2->name="Daniel Alves";
	$p3->name="Gerard Piqué";
	$p4->name="Carles Puyol";
	$p5->name="Éric Abidal";
	$p6->name="Cesc Fàbregas";
	$p7->name="Xavi";
	$p8->name="Andrés Iniesta Luján";
	$p9->name="Alexis Sánchez";
	$p10->name="Lionel Messi";
	$p11->name="Pedro";
	$p1->save();
	$p2->save();
	$p3->save();
	$p4->save();
	$p5->save();
	$p6->save();
	$p7->save();
	$p8->save();
	$p9->save();
	$p10->save();
	$p11->save();

	$team1->save(array($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11));
////////////////////////////////////////////////////////////////////////////////
	$match=new match();
	$match->priority=1;
	$match->save(array($team,$team1));
}
public function view(){
	$match=new match();
	$match->get();
	foreach($match as $m){
		print_r($m->stored);
		$m->team->get();
		foreach($m->team as $tea){
			$tea->player->get();
			print_r($tea->stored);
			foreach($tea->player as $player)
				print_r($player->stored);
	
								}
							}


	}
public function add_action_type(){
	$type=new action_type();
	$type->name="goal";
	$type->is_same="1";
	$type->first_title="scored";
	$type->second_title="helped by";
	$type->save();
	
	$type=new action_type();
	$type->name="foul";
	$type->is_same="0";
	$type->first_title="attacked";
	$type->save();
	}
public function add_action(){
	$action=new action();
	$type=new action_type(1);
	$fplayer=new player(11);
	 $team1=$fplayer->team->get();
	
	$splayer=new player(2);
	$team2=$splayer->team->get();
	$match=new match(1);
	$action->save(array($type,$match,$fplayer,$splayer));
	$action->set_join_field($fplayer,"team_id",$team1->id);
	$action->set_join_field($splayer,"team_id",$team2->id);
	
	$action=new action();
	$type=new action_type(2);
	$fplayer=new player(11);
	 $team1=$fplayer->team->get();
	
	$splayer=new player(17);
	$team2=$splayer->team->get();
	$match=new match(1);
	$action->save(array($type,$match,$fplayer,$splayer));
	$action->set_join_field($fplayer,"team_id",$team1->id);
	$action->set_join_field($splayer,"team_id",$team2->id);
}

public function view_action(){
	$match=new match();
	$match->get();
	foreach($match as $m){
		print_r($m->stored);
		$m->action->get();
		foreach($m->action as $action){
			print_r($action->stored);
			$action->player->get();	
			foreach($action->player as $player){
			 print_r($player->stored);
			}
	}
	}
}
public function view_json_action($id){
	$s = new Match($id);
		$data = array();
		foreach($s->action->get() as $action){
			$players_id=array();
			foreach($action->player->get() as $player){
			$players_id[]=array($player->id);
			}
			$data[] = array("id"=>$action->id,"type_id"=>$action->action_type_id,"part"=>$action->part,"time"=>$action->time,"players"=>$players_id);
		}
		echo json_encode($data);
}
public function view_json_match($id){
	$teams=array();
 	$match=new match($id);
	$match->team->get();
	print_r($match->team->stord);
	foreach($match->team as $team){
		$players=array();
		$team->player->get();
		foreach($team->player as $player)
			$players[]=array("id"=>$player->id,"name"=>$player->name,"number"=>"1","playing"=>true,"picture"=>$player->picture);
		$teams[]=array("id"=>$team->id,"name"=>$team->name,"picture"=>$team->picture,"players"=>$players);
	}
		$match_array=array("id"=>$match->id,"teams"=>$teams);
		$action_type=new action_type();
		$action_type->get();
	foreach($action_type->get() as $type)
		$types[]=array("id"=>$type->id,"nama"=>$type->name,"is_same"=>$type->is_same,"first_title"=>$type->first_title,"second0_title"=>$type->second_title);		
		$data=array("match"=>$match_array,"action Type"=>$types);
	
	echo json_encode($data);
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */