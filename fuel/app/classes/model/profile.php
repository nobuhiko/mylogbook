<?php

class Model_Profile extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'full_name',
        'image',
        'location',
        'description',
        'website',
        'twitter',
        'camera',
        'user_id',
        'created_at',
        'updated_at'
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );


    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('full_name', 'Full Name', 'required');
        //$val->add_field('image', 'Image', '');
        $val->add_field('location', 'Location', 'max_length[255]');
        $val->add_field('description', 'Description', 'max_length[9999]');
        $val->add_field('website', 'Website', 'valid_url|max_length[255]');
        //$val->add_field('twitter', 'Twitter', '');
        $val->add_field('camera', 'Camera', 'max_length[255]');

        return $val;
    }
}
