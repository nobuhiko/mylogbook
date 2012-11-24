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

    public static function items($type, $add_empty = true) {


        $ret = Arr::assoc_to_keyval(
            self::find(
                'all',
                array(
                    'where'     => array(
                        array('type',  $type)
                    ),
                )
            ),
            'code', 'name');

        if ($add_empty) {
            $items[0] = '';
            $ret = array_merge($items, $ret);
        }

        return $ret;
    }

}
