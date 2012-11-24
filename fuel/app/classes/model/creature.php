<?php

class Model_Creature extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'name',

    );

    protected static $_many_many = array(
        'posts' => array(
            'key_from'          => 'id',
            'key_through_form'  => 'creature_id',
            'table_through'     => 'posts_creatures',
            'key_through_to'    => 'post_id',
            'model_to'          => 'Model_Post',
            'key_to'            => 'id',
            'cascade_save'      => true,
            'cascade_delete'    => false,
        ),
    );

    public static function parseCreatures($string){
        $ids    = array();
        $tags   = explode(",", trim($string));

        foreach($tags as $tag_name){
            $tag = Model_Creature::find()->where('name', $tag_name)->get_one();
            // 新しいタグの場合はタグテーブルに追加
            if(!$tag){
                $tag = new Model_Creature();
                $tag->name = $tag_name;
                $tag->save();
            }
            array_push($ids, $tag);
        }
        return $ids;
    }

    public static function getList() {
        return json_encode(\Arr::pluck(Model_Creature::find('all', array('select' => 'name')), 'name'));
    }
}
