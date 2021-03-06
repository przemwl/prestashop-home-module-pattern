<?php

class BleboxBottomSliderData extends ObjectModel 
{
    public $id;
    public $id_topsliderdata;
    public $title;
    public $subtitle;
    public $button_text;
    public $button_uri;
    
    
    public static $definition = array(
        'table' => 'blebox_bottom_slider',
        'primary' => 'id_blebox_bottom_slider',
        'multilang' => true,
        'fields' => array(
            'title' =>        array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'subtitle' =>     array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'button_text' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'button_uri' =>   array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'image_src' =>   array('type' => self::TYPE_STRING, 'validate' => 'isString')
        ),
    );
    
}
