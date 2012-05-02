<?php
/**
 * This is the model class for table "likes".
 *
 * The followings are the available columns in table 'likes':
 * @property int(11) $id
 * @property int(11) $action_id
 * @property int(11) $prediction_id
 * @property tinyint(1) $is_duplicated
**/
class Like extends DataMapper {
	var $has_one = array('action' , 'prediction', 'user');
	var $has_many = array();
}
?>