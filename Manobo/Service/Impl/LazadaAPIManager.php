<?php
namespace Manobo\Service\Impl;

class LazadaAPIManager extends \Manobo\Service\APIManager {
    
    const API_URL = 'https://sellercenter-api.lazada.co.id/';
    const API_KEY = 'ac05bc11b491fc0040164c66d4dbe1bd014e15f2';
    const API_USER = 'orders.bonofactum@gmail.com';
    
    public function updateStock($config_id, $config_type, $dataToSend) {
        if(function_exists("curl_init")){
            //Get current timezone
            $current_timezone = date_default_timezone_get();
            
            //Set current timezone as Lazada API server time
            date_default_timezone_set("Asia/Jakarta");
            
            // API parameters to update stock
            $parameters = array(
                'Action' => 'ProductUpdate',
                'Format' => 'XML',
                'Timestamp' => date('c'),
                'UserID' => self::API_USER,
                'Version' => '1.0'
            );
            
            // XML data to put on request
            $xmlData = new DOMDocument('1.0', 'UTF-8');
            libxml_use_internal_errors(true);
            $xml_request = $xmlData->appendChild($xmlt->createElement('Request'));
            $xml_product = $xml_request->appendChild($xmlt->createElement('Product'));
            $xml_product->appendChild($xmlt->createElement('SellerSku', '09000039_45'));
            $xml_product->appendChild($xmlt->createElement('Quantity', 0));
            
            $response = $this->request($parameters, 'POST', $xmlt);
            $request_id = (string)$response->Head->RequestId;
            $result = array();
            if (!is_null($request_id)) {
                $result['id'] = $request_id;
                $feed_params = array(
                    'Action' => 'FeedStatus',
                    'FeedID' => $request_id,
                    'Timestamp' => date('c'),
                    'UserID' => self::API_USER,
                    'Version' => '1.0'
                );
                $feed_response = request($feed_params, 'GET');
                $feed_status = (string)$feed_response->Body->FeedDetail->Status;
                if ($feed_status != 'Canceled') {
                    $result['status'] = $feed_status;
                }
            }
            
            //Set current timezone back to its original timezone
            date_default_timezone_set($current_timezone);
            
            return $result;
        }
    }

    public function request($parameters=array(), $request_type='POST', $xmlData = null) {
        // URL encode the parameters.
        $encoded = array();
        foreach ($parameters as $name => $value) {
            $encoded[] = rawurlencode($name) . '=' . rawurlencode($value);
        }
        $concatenated = implode('&', $encoded);

        // Compute signature and add it to the parameters.
        $parameters['Signature'] = rawurlencode(hash_hmac('sha256', $concatenated, $APIData[1]['key'], false));

        // Build Query String
        $queryString = http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);
        
        //Trigger curl to API Server
        $urlto = self::API_URL . "?" . $queryString;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlto);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 45);
        if ($request_type == 'POST' && $xmlData != null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData->saveXML());
        }
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            echo "errormessage=".curl_errno($ch).": ".curl_error($ch);
        } else {
            $xml = simplexml_load_string($result) or die("Error: Cannot create object");
            return $xml;
        }
        curl_close($ch);
    }
}