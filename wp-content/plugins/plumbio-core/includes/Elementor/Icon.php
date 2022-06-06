<?php
namespace Plumbio\Helper\Elementor;

class Icon
{

	public function __construct()
	{
		add_filter('elementor/icons_manager/additional_tabs', array($this, 'plumbio_custom_icon'));
	}

	function plumbio_custom_icon($array)
	{
		$plugin_url = plugins_url();

		return array(
			'custom-icon' => array(
				'name'          => 'custom-icon',
				'label'         => 'Plumbio Icon',
				'url'           => '',
				'enqueue'       => array(
					$plugin_url . '/plumbio-core/assets/elementor/icon/font/style.css',
				),
				'prefix'        => '',
				'displayPrefix' => '',
				'labelIcon'     => 'plumbio-icon',
				'ver'           => '',
				'fetchJson'     => $plugin_url . '/plumbio-core/assets/elementor/icon/js/regular-icon.json',
				'native'        => 1,
			),
		);
	}
}
