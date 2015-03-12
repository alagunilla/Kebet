<?php
class Brainvire_Ordercomment_Model_Observer
{
	
    /**
     * Save comment from agreement form to order
     *
     * @param $observer
     */
    public function saveOrderComment($observer)
    {
        $orderComment = Mage::getSingleton('core/session')->getBrainvireOrdercomment();
       
            if (!empty($orderComment)) {
                $order = $observer->getEvent()->getOrder(); 
                $order->setCustomerComment($orderComment);
                $order->setCustomerNoteNotify(true);
                $order->setCustomerNote($orderComment);
            }
    }
}
