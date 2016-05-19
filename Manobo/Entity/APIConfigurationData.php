<?php

//namespace Manobo\Entity;

/**
 * Description of APIConfigurationData
 *
 * @author cosa
 */
class APIConfigurationData {
    var $id;
    var $sc_id;
    var $type;
    var $url;
    var $key;
    var $user;
    var $password;
    
    function getId() {
        return $this->id;
    }
    
    function getScId() {
        return $this->sc_id;
    }
    
    function getType() {
        return $this->type;
    }
    
    function getUrl() {
        return $this->id;
    }
    
    function getKey() {
        return $this->type;
    }
    
    function getUser() {
        return $this->id;
    }
    
    function getPassword() {
        return $this->type;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setScId($sc_id) {
        $this->sc_id = $sc_id;
    }
    
    function setType($type) {
        $this->type = $type;
    }
    
    function setUrl($url) {
        $this->url = $url;
    }
    
    function setKey($key) {
        $this->key = $key;
    }
    
    function setUser($user) {
        $this->user = $user;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }
    
    function getData($sc_id, $type) {
        // DataObject query to get data
        
        return $this;
    }
    
}
