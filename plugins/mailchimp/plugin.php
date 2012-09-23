<?php
/*
 * Mailchimp API Integration class
 * @copyright 2012 Full Ambit Media LLC
 * @author Zach Bloomquist <zbloomq@live.com>
 */
require_once(__DIR__.'/MCAPImini.class.inc.php');
class plugin_mailchimp{
	protected $apiKey='31b88f4cce502d251ff00c4f2bda11ea-us5';
	protected $listNumber='a7df7b21b5'; //enter the ID of the list to subscribe the user to here
	protected $api;
	function __construct(){
		$this->api=new MCAPI($this->apiKey);
	}
	function runFromCustomForm($fields,$formData){
		foreach($fields as $fieldItem){
			if(!isset($fieldItem['apiFieldToMapTo']{1})||$fieldItem['apiFieldToMapTo']==NULL){
				continue;
			}
			$apiFields[$fieldItem['apiFieldToMapTo']]=$formData[':'.$fieldItem['id']];
		}
		$name=explode(' ',$apiFields['name'],2);
		$merge_vars=array('FNAME'=>$name[0],'LNAME'=>$name[1],'OPTIN_IP'=>$_SERVER['REMOTE_ADDR'],'OPTIN_TIME'=>date('Y-m-d H:i:s'));
		$result=$this->api->listSubscribe($this->listNumber,$apiFields['email'],$merge_vars);
		if(!$result){
			return $this->api->errorMessage;
		}else{
			return TRUE;
		}
	}
}