<?php
/**
 * This is the model class for table "points".
 *
 * The followings are the available columns in table 'points':
 * @property int(11) $id
 * @property int(11) $action_id
 * @property int(11) $prediction_id
 * @property text $message
 * @property int(5) $amount
**/
class Point extends DataMapper {
	var $has_one = array('action','prediction','user');
	var $has_many = array();
}
?>