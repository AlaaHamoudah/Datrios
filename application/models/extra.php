<?php
/**
 * This is the model class for table "extras".
 *
 * The followings are the available columns in table 'extras':
 * @property int(11) $id
 * @property varchar(45) $prefix
 * @property varchar(45) $postfix
**/


//is_earned 
class Extra extends DataMapper {
	var $has_one = array();
	var $has_many = array('action','action_type');
}
?>