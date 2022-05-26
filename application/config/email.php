<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 587,
    'smtp_user' => 'administrator@judiciary.gov.bt',
    'smtp_pass' => 'wxvvbkubwljsqara',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'newline' => "\r\n", //Newline character. (Use “\r\n” to comply with RFC 822).
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'UTF-8',
    'wordwrap' => TRUE
);
