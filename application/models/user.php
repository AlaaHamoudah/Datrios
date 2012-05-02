<?php
/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property int(11) $id
 * @property varchar(100) $name
 * @property varchar(50) $fb_id
 * @property varchar(500) $access_token
**/
class User extends DataMapper {
	var $has_one = array();
	var $has_many = array("prediction","action","point","like");
}
?>