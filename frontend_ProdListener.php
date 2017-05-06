#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function deployFrontendPackage($request)
{
	echo "\nRecieved Request: Installing backend package...\n";
	shell_exec('sh install_frontend.sh'); 
	echo "Success!\n";
}

function requestProcessor($request)
{
  echo "Request Received".PHP_EOL;
  var_dump($request);
  echo '\n' . 'End Message';
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "FEprod":
      return deployFrontendPackage($request);	
  }
}

$server = new rabbitMQServer("deployRabbitServer.ini","frontendProd");

$server->process_requests('requestProcessor');
exit();
?>
