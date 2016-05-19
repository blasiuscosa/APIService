<?php
//namespace Manobo\Service;

/**
 * Provide interface for any API connection from/to any Sales Partner/Channel
 * @author IT
 */
interface APIService {
    
    /**
     * Send API request using all related parameters
     */
    public function send($request, $config_id, $config_type, $dataToSend);
    
}
