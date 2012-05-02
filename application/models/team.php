<?php
/**
 * This is the model class for table "teams".
 *
 * The followings are the available columns in table 'teams':
 * @property int(11) $id
 * @property varchar(100) $name
 * @property varchar(500) $picture
**/
class Team extends DataMapper {
	var $has_one = array();
	var $has_many = array("player","match","action"=>array("join_table"=>"actions_players"));
}
?>