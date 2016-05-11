<?php
namespace Manobo\Service;

/**
 * Description of APIManager
 * @author Cosa
 */
class APIManager implements APIService{

    var $api_url;
    var $api_key;
    
    public function send($request, $config_id, $config_type, $dataToSend) {
        $APIConfig = new \APIConfigurationData();
        $APIConfigData = $APIConfig->getData($config_id, $config_type);
        
        if ($APIConfigData != null) {
            $this->api_url = $APIConfigData->getUrl();
            $this->api_key = $APIConfigData->getKey();
            if ($APIConfigData->getScId() == 1) {
                $objAPI = new Impl\LazadaAPIManager();
                $objAPI->updateStock($config_id, $config_type, $dataToSend);
            }
        }
    }

}
