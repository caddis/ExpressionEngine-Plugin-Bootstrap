<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Bootstrap model
 *
 * @package bootstrap
 * @author Your Name <name@caddis.co>
 * @link https://github.com/caddis/expressionengine-plugin-bootstrap
 * @copyright Copyright (c) 2015, Caddis Interactive, LLC
 */

class Bootstrap_model extends CI_Model
{
	/**
	 * Custom method description
	 *
	 * @param array $conf {
	 *     @var false|int $aDefaultValue Short description of value function
	 *     @var bool $anotherDefault Short description of boolean
	 *     @var array $defaultArray Short description of array
	 *     @var false|int $limit Limit the amount of entries returned
	 *  }
	 * @return array
	 */
	public function myCustomDatabaseMethod($conf = array())
	{
		// Set up defaults
		$defaultConf = array(
			'aDefaultValue' => false,
			'anotherDefault' => true,
			'defaultArray' => array(),
			'limit' => false
		);

		// Merge arrays for final configuartion
		$conf = array_merge($defaultConf, $conf);

		// Select items from the database
		ee()->db->select('*')
			->from('channel_titles');

		// Limit results if applicable
		if ($conf['limit']) {
			ee()->db->limit($conf['limit']);
		}

		// Return results as an array
		return ee()->db->get()->result_array();
	}
}