<?php

//namespace Manobo\Entity;

/**
 * Description of StockData
 *
 * @author cosa
 */
class StockData {
    var $sku;
    var $quantity;
    
    function getSku() {
        return $this->sku;
    }
    
    function getQuantity() {
        return $this->quantity;
    }
    
    function setSku($sku) {
        $this->sku = $sku; 
    }
    
    function setQuantity($qty) {
        $this->quantity = $qty; 
    }
}
