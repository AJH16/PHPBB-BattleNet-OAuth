<?php
/**
*
* @package Battle.Net OAuth(US)
* @copyright (c) 2015 AJ Henderson
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'AUTH_PROVIDER_OAUTH_SERVICE_BATTLENETUS'				=> 'Battle.Net US',
	'AUTH_PROVIDER_OAUTH_SERVICE_BATTLENETEU'				=> 'Battle.Net EU',
));
