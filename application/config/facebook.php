<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//This two below you get at your Facebook App "manager"
$config['fbAppId'] = '';
$config['fbSecret'] = '';

//Put here what you want to query. You can test it before with Graph API Explorer
$config['fbApiQuery'] = '/me?fields=first_name,last_name,birthday,location,email,name';

//Did you have configured any extended permission? Yes!? Put them below (separate it with commas)
$config['fbPermission'] = 'email';

//User is logged: ok! Where you want to send him?
$config['fbPostLoginRedirect'] = 'http://localhost/ci_test/';
?>
