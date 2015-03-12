<?php

class Brainvire_Ordercomment_IndexController extends Mage_Core_Controller_Front_Action
{
   public function updateAction()
   {
       
       if ($this->getRequest()->isPost()) {
            
           //print_r($this->getRequest()->getPost());
           //echo $this->getRequest()->getPost('form_key');
           
           if($this->getRequest()->getPost('form_key')!=Mage::getSingleton('core/session')->getFormKey()) {
           
                Mage::getSingleton('core/session')->addError(Mage::helper('ordercomment')->__('Invalid form key.'));
                $this->_redirectReferer();
                return;
                
           }
           
           $order_id = (int)$this->getRequest()->getPost('order_id');
           $orderComment = trim($this->getRequest()->getPost('ordercomment'));
           
           $order = Mage::getModel('sales/order')->load($order_id); 
           $order->setCustomerComment($orderComment);
           $order->setCustomerNoteNotify(true);
           $order->setCustomerNote($orderComment);
           
           if($order->save()) {
           
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('ordercomment')->__('Comment has been successfully saved.'));
                $this->_redirectReferer();
                return;
           }
           
           Mage::getSingleton('core/session')->addError(Mage::helper('ordercomment')->__('Comment was not save due some error.'));
           $this->_redirectReferer();
           return;
           
		
        }

   }
}
