<?php


class AdminBleboxBottomSliderController extends ModuleAdminController
 {
    public function __construct()
    {
        $this->module = 'bleboxtopslider';
        $this->template = 'displayAdmin.tpl';
        $this->bootstrap = true;
        $this->context = Context::getContext();
        
        parent::__construct();
    } 
    
    public function createTemplate($tpl_name) {
        
        
//        $sliderdata = new BleboxTopSliderData(1, Context::getContext()->language->id);
        $token = Tools::getAdminTokenLite('AdminBleboxBottomSlider');
        return $this->context->smarty->createTemplate(__DIR__ . '/../..//views/templates/admin/'. $tpl_name, array(
            'token' => $token,
//            'sliderdata' => $sliderdata
            ));
    }
    
    public function initContent()
    {
        
       
        parent::initContent();
        $this->setTemplate('displayAdmin.tpl');
    }
    
    public function postProcess()
    {
//        if (!empty(Tools::getValue('sliderForm'))) {
//            $data = Tools::getValue('sliderForm');
//            $sliderdata = new BleboxTopSliderData(1, Context::getContext()->language->id);
//
//            if($sliderdata->id == null) {
//                $sliderdata = new BleboxTopSliderData();
//            }
//
//            $sliderdata->title = $data['title'];
//            $sliderdata->subtitle = $data['subtitle'];
//            $sliderdata->button_text = $data['button_text'];
//            $sliderdata->button_uri = $data['button_uri'];
//            $sliderdata->save();   
//        }
    }
       
    
        
    
}
