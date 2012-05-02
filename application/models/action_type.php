<?php
/**
 * This is the model class for table "action_types".
 *
 * The followings are the available columns in table 'action_types':
 * @property int(11) $id
 * @property varchar(100) $name
 * @property varchar(100) $picture
 * @property binary(1) $is_same
 * @property varchar(100) $first_title
 * @property varchar(100) $second_title
**/
class Action_type extends DataMapper {
	var $has_one = array();
	var $has_many = array('extras','action');
}
?>