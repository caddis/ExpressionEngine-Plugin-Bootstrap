<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Bootstrap plugin
 *
 * @package    bootstrap
 * @author     Your Name <name@example.com>
 * @link       https://www.example.co
 * @copyright  Copyright (c) 2015, Caddis Interactive, LLC
 */

$plugin_info = array (
	'pi_name' => 'Bootstrap',
	'pi_version' => '1.0.0',
	'pi_author' => 'Your Name',
	'pi_author_url' => 'https://www.example.co',
	'pi_description' => 'A pithy description'
);

class Bootstrap
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		// Do constructor stuff here if needed such as loading the model
		ee()->load->model('bootstrap_model');

		// Get the namespace param or set a default
		$this->namespace = ee()->TMPL->fetch_param('namespace', 'foo') . ':';
	}

	/**
	 * Tag Pair tag
	 *
	 * @return string
	 */
	public function tag_pair()
	{
		// Get the limit parameter or set a default of 15
		$limit = ee()->TMPL->fetch_param('limit', 15);

		// Get stuff from the model
		$entries = ee()->bootstrap_model->myCustomDatabaseMethod(array(
			'limit' => $limit
		));

		// Handle tag pair no results
		if (! $entries) {
			return false;
		}

		// Start vars array
		$vars = array();

		// Namespace the vars
		foreach ($entries as $key => $val) {
			foreach ($val as $k => $v) {
				$vars[$key][$this->namespace . $k] = $v;
			}
		}

		// Parse tag pair variables
		return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $vars);

		// Or return a string for a single tag:
		return 'Hello World';
	}

	/**
	 * Single tag
	 *
	 * @return string
	 */
	public function single_tag()
	{
		return 'Hello World';
	}
}