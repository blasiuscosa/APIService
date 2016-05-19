<?php

//namespace Manobo\Entity;
include('./Manobo/Config/confy.php');

/**
 * Description of APIHistoryData
 *
 * @author cosa
 */
class APIHistoryData {
    const HISTORY_TABLE = "api_history";
    var $command;
    var $parameter;
    var $request_start_time;
    var $request_end_time;
    var $status;
    var $response_id;
    
    public function  __construct() {
        list($usec, $sec) = explode(' ', microtime());
        $this->setRequestStartTime($sec);
    }
    
    function getCommand() {
        return $this->command;
    }
    
    function getParameter() {
        return $this->parameter;
    }
    
    function getRequestStartTime() {
        return $this->request_start_time;
    }
    
    function getRequestEndTime() {
        if ($this->request_end_time <= $this->request_start_time) {
            list($usec, $sec) = explode(' ', microtime());
            $this->request_end_time = $sec;
        }
        return $this->request_end_time;
    }
    
    function getStatus() {
        return $this->status;
    }
    
    function getResponseId() {
        return $this->response_id;
    }
    
    function setCommand($command) {
        $this->command = $command; 
    }
    
    function setParameter($parameter) {
        $this->parameter = $parameter; 
    }
    
    function setRequestStartTime($request_start_time) {
        $this->request_start_time = $request_start_time; 
    }
    
    function setRequestEndTime($request_end_time) {
        $this->request_end_time = $request_end_time; 
    }
    
    function setStatus($status) {
        $this->status = $status; 
    }
    
    function setResponseId($response_id) {
        $this->response_id = $response_id; 
    }
    
    function save() {
        $db = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
	if ($db) mysql_select_db(DB_DATABASE);
        $columns_string = "command,parameter,request_start_time,request_end_time,status,response_id";
        $values_string = "'" . $this->getCommand() . "','" . $this->getParameter() . "','" . $this->getRequestStartTime() . "','" 
                . $this->getRequestEndTime() . "','" . $this->getStatus() . "','" . $this->getResponseId() . "'";
        $query = "INSERT INTO " . self::HISTORY_TABLE . " ($columns_string) VALUES ($values_string)";
        $result = mysql_query($query, $db) or mysql_error();
    }
}
