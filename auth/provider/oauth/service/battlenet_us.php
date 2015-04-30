<?php
/**
*
*
* @copyright (c) 2015 AJ Henderson
* @license GNU General Public License, version 2 (GPL-2.0)
*
*
*/

namespace ajhenderson\battlenet_oauth_us\auth\provider\oauth\service;

/**
* Battle.Net OAuth service
*/
class battlenet_us extends \phpbb\auth\provider\oauth\service\base
{
	/**
	* phpBB config
	*
	* @var \phpbb\config\config
	*/
	protected $config;

	/**
	* phpBB request
	*
	* @var \phpbb\request\request_interface
	*/
	protected $request;

	/**
    * phpBB user
    *
    * @var \phpbb\user
    */
	protected $user;

	/**
	* Constructor
	*
	* @param	\phpbb\config\config				$config
	* @param	\phpbb\request\request_interface	$request
	* @param    \phpbb\user                         $user
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\request\request_interface $request, \phpbb\user $user)
	{
		$this->config = $config;
		$this->request = $request;
		$this->user = $user;
		$this->user->add_lang_ext('ajhenderson/battlenet_oauth_us', 'common');
	}

	/**
	* {@inheritdoc}
	*/
	public function get_auth_scope()
	{
		return array(
			'wow_profile',
		);
	}

	/**
	* {@inheritdoc}
	*/
	public function get_service_credentials()
	{
		return array(
			'key'		=> $this->config['auth_oauth_battlenetus_key'],
			'secret'	=> $this->config['auth_oauth_battlenetus_secret'],
		);
	}

	/**
	* {@inheritdoc}
	*/
	public function perform_auth_login()
	{
		if (!($this->service_provider instanceof \OAuth\OAuth2\Service\BattleNetUS))
		{
			throw new \phpbb\auth\provider\oauth\service\exception('AUTH_PROVIDER_OAUTH_ERROR_INVALID_SERVICE_TYPE');
		}

		// This was a callback request from battlenet, get the token
		$this->service_provider->requestAccessToken($this->request->variable('code', ''));

		// Send a request with it
		$result = json_decode($this->service_provider->request('account/user'), true);

		// Return the unique identifier returned from battlenet
		return $result['battletag'];
	}

	/**
	* {@inheritdoc}
	*/
	public function perform_token_auth()
	{
		if (!($this->service_provider instanceof \OAuth\OAuth2\Service\BattleNetUS))
		{
			throw new \phpbb\auth\provider\oauth\service\exception('AUTH_PROVIDER_OAUTH_ERROR_INVALID_SERVICE_TYPE');
		}

		// Send a request with it
		$result = json_decode($this->service_provider->request('account/user'), true);

		// Return the unique identifier returned from battlenet
		return $result['battletag'];
	}
}
