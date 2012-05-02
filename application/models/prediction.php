<?php

/**
 * This is the model class for table "predictions".
 *
 * The followings are the available columns in table 'predictions':
 * @property int(11) $id
 * @property int(11) $action_type_id
 * @property int(11) $match_id
 * @property int(11) $user_id
 * @property int(1) $part
 * @property int(3) $time
 * @property int(11) $related_id
 * @property tinyint(1) $status
 * */
class Prediction extends DataMapper {

    // TODO:: related self realtion???
	// TODO:: up to 2 team only
    var $has_one = array("action_type", "match", "user");
    var $has_many = array('team');
    
  
}

?>