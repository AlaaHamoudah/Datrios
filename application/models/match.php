<?php

/**
 * This is the model class for table "matches".
 *
 * The followings are the available columns in table 'matches':
 * @property int(11) $id
 * @property timestamp $start_time
 * @property varchar(100) $result
 * @property int(2) $priority
 * */
//it has one team cause i don't know , i cant put it many to many ! 
//make class for first and second team (advanced relation)
class Match extends DataMapper {

    var $has_one = array();
    var $has_many = array('team','action');

}

?>