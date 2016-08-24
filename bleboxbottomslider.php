<?php

include 'classes/BleboxBottomSliderData.php';

class BleboxBottomSlider extends Module
{
    public function __construct()
    {
            $this->name = 'bleboxbottomslider';
            $this->tab = 'front_office_features';
            $this->version = '1.6.0';
            $this->author = 'Przemysław Wleklik | PodwysockiDESIGN';
            $this->need_instance = 0;

            $this->bootstrap = true;
            parent::__construct();

            $this->displayName = $this->l('Blebox Bottom Slider');
            $this->description = $this->l('Display slider in main page.');
            $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {

        $parent_tab = new Tab();
        $parent_tab->name[$this->context->language->id] = $this->l('Blebox Bottom Slider');
        $parent_tab->class_name = 'AdminBleboxBottomSlider';
        $parent_tab->id_parent = 0; // Home tab
        $parent_tab->module = $this->name;
        $parent_tab->add();	
        $this->installDb();
        
        return parent::install() && 
                $this->registerHook('bleboxHomeBottomSlider');
         
    }

    public function uninstall() 
    {
        // Uninstall Tabs
        $tab = new Tab((int)Tab::getIdFromClassName('AdminBleboxBottomSlider'));
        $tab->delete();
        $this->uinstallDb();
        
        // Uninstall Module
        if (!parent::uninstall())
            return false;
        return true;
    }


//    public function hookBleboxHomeBottomSlider()
//    {
//        $bleboxTopSliderData = new BleboxBottomSliderData(1, Context::getContext()->language->id);
//        
//        $this->context->smarty->assign(array(
//            'bleboxTopSliderData' => $bleboxTopSliderData
//        ));
//       
//       return $this->display(__FILE__, 'views/bottomslider.tpl');
//    }
    
    protected function installDb()
    {
       Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'blebox_bottom_slider` (
            `id_blebox_bottom_slider` int(10) unsigned NOT NULL auto_increment,
            `title` varchar(255) NOT NULL,
            `subtitle` varchar(255) NOT NULL,
            `button_text` varchar(255) NOT NULL,
            `button_uri` varchar(255) NOT NULL,
            `image_src`  varchar(255) NOT NULL,
            PRIMARY KEY  (`id_blebox_bottom_slider`)
          ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8');

      Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'blebox_bottom_slider_shop` (
            `id_blebox_bottom_slider` int(10) unsigned NOT NULL auto_increment,
            `id_shop` int(10) unsigned NOT NULL,
            PRIMARY KEY (`id_blebox_bottom_slider`, `id_shop`)
          ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8');

       Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'blebox_bottom_slider_lang` (
            `id_blebox_bottom_slider` int(10) unsigned NOT NULL,
            `id_lang` int(10) unsigned NOT NULL,
            `message` text NOT NULL,
            `location` text NOT NULL,
            PRIMARY KEY (`id_blebox_bottom_slider`,`id_lang`)
          ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8');
    }
    
    protected function uinstallDb()
    {
       Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'blebox_bottom_slider`');
       Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'blebox_bottom_slider_shop`');
       Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'blebox_bottom_slider_lang`');
    }


//    public function getContent()
//    {
//        $output = '<h2>'.$this->displayName.'</h2>';
//        return $output;
//    }
        
}

