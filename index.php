<?php
include('./Manobo/Service/Impl/LazadaAPIManager.php');
$request = (isset($_POST['request'])) ? isset($_POST['request']) : $_GET['request'];
$sc = (isset($_POST['sc'])) ? isset($_POST['sc']) : $_GET['sc'];
$sku = (isset($_POST['sku'])) ? isset($_POST['sku']) : $_GET['sku'];
$qty = (isset($_POST['qty'])) ? isset($_POST['qty']) : $_GET['qty'];
if ($request != '') {
    if ($sc != '' && $sku != '' && $qty != '') {
        if (strtolower($sc) == 'lz.id') {
            $objAPI = new LazadaAPIManager();
            if (strtolower($request) == 'updatestock') {
                $req = array('request'=>$request);
                $result = $objAPI->{"$request"}($sku, $qty);
                $result = array_merge($req, $result);
                echo '<pre>';
                print_r($result);
            }
        }
    }
}
?>
