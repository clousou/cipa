<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['useragent'] 		= 'SMART PARKING';
$config['protocol'] 		= 'smtp';
#$config['mailpath'] 		= '/usr/sbin/sendmail';
$config['smtp_host'] 		= 'mail.smart-parking-trisakti.online';
$config['smtp_user'] 		= 'info@smart-parking-trisakti.online';
$config['smtp_pass'] 		= 'Holiday08';
$config['smtp_port'] 		= 587;
$config['smtp_timeout'] 	= 5;
$config['wordwrap'] 		= TRUE;
$config['wrapchars'] 		= 76;
$config['mailtype'] 		= 'html';
$config['charset'] 			= 'utf-8';
$config['validate'] 		= FALSE;
$config['priority'] 		= 3;
$config['crlf'] 			= "\r\n";
$config['newline'] 			= "\r\n";
$config['bcc_batch_mode'] 	= FALSE;
$config['bcc_batch_size'] 	= 200;

/* End of file email.php */