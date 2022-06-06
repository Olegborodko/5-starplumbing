<?php
namespace Plumbio\Helper\Widgets;

/*
==============================
custom Recent Tour Type Widget
==============================
*/

class Plumbio_Widget_Selector extends \WP_Widget
{



	private $defaults = array();
	/**
	 * Register widget with WordPress.
	 */
	public function __construct()
	{
		$widget_ops     = array(
			'classname'                   => 'sidebar-widget popular-posts',
			'description'                 => __('Posts Widget Selector From Template'),
			'customize_selective_refresh' => true,
		);
		$this->defaults = array(
			'template_option' => 2,

		);
		parent::__construct('recent_posts', __('Plumbio Widget Selector'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		global $smof_data;

		$sidebar_widget_elementor = isset($instance['template_option']) ? $instance['template_option'] : '';
		$pluginElementor          = \Elementor\Plugin::instance();
		$plumbio_all_ssave_element  = $pluginElementor->frontend->get_builder_content($sidebar_widget_elementor);
		echo do_shortcode($plumbio_all_ssave_element);
	}
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		if (!empty($new_instance['template_option'])) {
			$instance['template_option'] = (int) $new_instance['template_option'];
		}

		return $instance;
	}

	public function flush_widget_cache()
	{
		wp_cache_delete('plumbio_widget_selector', 'widget');
	}

	public function form($instance)
	{
		$instance        = wp_parse_args((array) $instance, $this->defaults);
		$template_option = isset($instance['template_option']) ? esc_attr($instance['template_option']) : '';
?>
		<p><label for="<?php printf($this->get_field_id('template_option')); ?>"><?php _e('Select Template'); ?></label>
		</p>
		<?php
		$elements_saved = plumbio_core_elementor_library();

		?>

		<select id="<?php echo $this->get_field_id('template_option'); ?>" name="<?php echo $this->get_field_name('template_option'); ?>">
			<?php
			foreach ($elements_saved as $key => $element) {
				if ($template_option == $key) {
					$sel = 'selected ="selected"';
				} else {
					$sel = '';
				}
			?>
				<option <?php echo $sel; ?> value="<?php echo esc_attr($key); ?>[]"><?php echo $element; ?></option>
			<?php
			}
			?>

		</select>
<?php
	}
}
