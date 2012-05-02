<?php
/**
 * This is the model class for table "players".
 *
 * The followings are the available columns in table 'players':
 * @property int(11) $id
 * @property varchar(500) $name
 * @property varchar(500) $picture
**/
class Player extends DataMapper {
	var $has_one = array();
	var $has_many = array('team','action');
}
?>