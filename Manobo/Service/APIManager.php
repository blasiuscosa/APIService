<?php
//namespace Manobo\Service;
include('APIService.php');

/**
 * Description of APIManager
 * @author Cosa
 */
class APIManager implements APIService{

    var $api_url;
    var $api_key;
    
    public function send($request, $config_id, $config_type, $dataToSend) {
    }

}
