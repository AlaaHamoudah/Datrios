<?php

/**
 * This is the model class for table "actions".
 *
 * The followings are the available columns in table 'actions':
 * @property int(11) $id
 * @property int(11) $action_type_id
 * @property int(11) $match_id
 * @property int(11) $user_id
 * @property int(1) $part
 * @property int(3) $time
 * @property int(11) $related_id
 * @property tinyint(1) $status
 * */
class Action extends DataMapper {
	
	// TODO:: related self realtion???
	// TODO:: up to 2 team only
    var $has_one = array('action_type', 'match', 'user');
    var $has_many = array('team'=>array("join_table"=>"actions_players"),'extra','player');
    
	
    //function _loggedIn() don't store anything unless he is logged in :@
    function _is_during_match($field) {
        $action = new Action();
        $action->match->get();
        if ($this->time > (time() - ($action->match->start_time->get())) && $this->time < ($action->match->start_time->get() + 150)) {
            return true;
        }

        return false;
    }

    function _duplicated($field) {
        $action = new Action();
        $action->group_start()->where("match_id", $this->match_id)->
                where("time", $this->time)->
                where("type_id", $this->type_id)->
                where("first_id", $this->first_id)->group_end()->get();
        //i can use get_where(array('id' => $id), $limit, $offset);

        if ($action->result_count() > 0) {
            $like = new like(); //wtf make it in the save function ###
            $like = new like(); //wtf make it in the save function ###
            $is_edited = false;
            if (!empty($this->second_id) && empty($action->second_id)) {
                $action->second_id = $this->second_id;
                $is_edited = true;
            }
            if (!empty($this->$related_id) && empty($action->$related_id)) {
                $action->$related_id = $this->$related_id;
                $is_edited = true;
            }
//            $extra  = new Extra();
//            $extra->where_related($this)->get();
//            if(!empty($this->extra) )
//            
//            $extra2 = new Extra();
//            
//            $extra2->where_related(new Action_type($this->action_type_id));
            //  if($this->where_related())
              $action->where('user_id', $this->user_id)->group_end() - get();
            if ($action->result_count() > 0) {
                return false;
            } else {
                $like->action_id = $this->id;
                $like->is_duplicated = true;
                $like->save();
            }
            return true;
        }

        return false;
    }

}

?>