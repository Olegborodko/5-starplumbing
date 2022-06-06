<?php
namespace Plumbio\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Plumbio_Promo extends Widget_Base
{

    public function get_name()
    {
        return 'plumbio_promo';
    }

    public function get_title()
    {
        return esc_html__('Plumbio Promo', 'plumbio-core');
    }

    public function get_icon()
    {
        return 'sds-widget-ico';
    }

    public function get_categories()
    {
        return ['plumbio'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__('general', 'plumbio-core'),
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('BG Image', 'plumbio-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'plumbio-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'plumbio-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('', 'plumbio-core'),
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'plumbio-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('', 'plumbio-core'),
                'placeholder' => esc_html__('Type your description here', 'plumbio-core'),

            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $bg_image = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
        $bg_image_alt = get_post_meta($settings["bg_image"]["id"], "_wp_attachment_image_alt", true);
        $icon = $settings["icon"];
        $heading = $settings["heading"];
        $description = $settings["description"];
?> <div class="section-indent">
            <div class="fullwidth-promo fullwidth-promo__place-tabs init-parallax lazyload" data-bg="<?php echo  $bg_image;?>">
                <div class="fullwidth-promo__indent-03">
                    <div class="tt-icon"><?php \Elementor\Icons_Manager::render_icon(($icon), array('aria-hidden' => 'true')); ?></div>
                    <div class="tt-title">
                        <?php echo $heading; ?>
                    </div>
                    <p>
                        <?php echo $description; ?>
                    </p>
                </div>
            </div>
        </div> <?php
            }

            protected function _content_template()
            {
            }
        }
