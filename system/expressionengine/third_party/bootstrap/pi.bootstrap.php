<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Bootstrap plugin
 *
 * @package bootstrap
 * @author Your Name <name@caddis.co>
 * @link https://www.caddis.co
 * @copyright Copyright (c) 2015, Caddis Interactive, LLC
 */

$plugin_info = array (
	'pi_name' => 'Bootstrap',
	'pi_version' => '1.0.0',
	'pi_author' => 'Your Name',
	'pi_author_url' => 'https://www.caddis.co',
	'pi_description' => 'A pithy description',
	'pi_usage' => Bootstrap::usage()
);

class Bootstrap
{
	public function __construct()
	{
		// Do constructor stuff here if needed such as loading the model
		ee()->load->model('bootstrap_model');

		// Get the namespace parameter or set a default
		$this->namespace = ee()->TMPL->fetch_param('namespace', 'foo') . ':';
	}

	/**
	 * Process tag pair contents
	 *
	 * @return string
	 */
	public function tag_pair()
	{
		// Get the tag data
		$tagdata = ee()->TMPL->tagdata;

		// Get the limit parameter or set a default of 15
		$limit = ee()->TMPL->fetch_param('limit', 15);

		// Get data
		$entries = ee()->bootstrap_model->myCustomDatabaseMethod(array(
			'limit' => $limit
		));

		// Handle tag pair no results
		if (! $entries) {
			return false;
		}

		// Start variables array
		$vars = array();

		// Namespace the vars
		foreach ($entries as $key => $val) {
			foreach ($val as $k => $v) {
				$vars[$key][$this->namespace . $k] = $v;
			}
		}

		// Parse tag pair variables
		return ee()->TMPL->parse_variables($tagdata, $vars);
	}

	/**
	 * Process single tag
	 *
	 * @return string
	 */
	public function single_tag()
	{
		// Return a string for a single tag
		return 'Hello World';
	}

	/**
	 * Add usage information to Control Panel
	 *
	 * @return string
	 */
	public static function usage()
	{
		return 'See docs and examples on GitHub: https://github.com/account/repo-name';
	}
}