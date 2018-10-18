<?php
namespace Meezin\PriceWarning\Observer;

class Productsaveafter implements \Magento\Framework\Event\ObserverInterface
{
  public function execute(\Magento\Framework\Event\Observer $observer)
  {
        $_product = $observer->getProduct();  // you will get product object
        $producType = $_product->getTypeId();
        $price = $_product->getPrice(); // will get price
        
        if($producType=='simple' && $price < 30)
            {
           	
            throw new \Magento\Framework\Exception\CouldNotDeleteException(__('Prices have been changed below 30!'));
            }
        

     return $this;
  }
}