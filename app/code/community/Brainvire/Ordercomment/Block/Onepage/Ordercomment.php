<?php

class Brainvire_Ordercomment_Block_Onepage_Ordercomment extends Mage_Checkout_Block_Onepage_Abstract
{
    protected function _construct()
    {    	
        $this->getCheckout()->setStepData('ordercomment', array(
            'label'     => Mage::helper('checkout')->__('Shipping Instructions'),
            'is_show'   => true
        ));
        
        parent::_construct();
    }
}
