<?php
function mailchimp_install($data,$db){
	$data->output['installSuccess']=TRUE;
	return TRUE;
}