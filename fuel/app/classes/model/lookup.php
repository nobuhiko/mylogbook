<?php

class Model_Lookup extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'code',
		'type',
		'position'
	);

    public static function item($type, $code) {

        $items = self::items($type);
        return isset($items[$code]) ? $items[$code] : false;
    }

    public static function items($type) {

        return Arr::assoc_to_keyval(
            self::find(
                'all',
                array(
                    'where'     => array(
                        array('type',  $type)
                    ),
                )
            ),
            'code', 'name');
    }

}
