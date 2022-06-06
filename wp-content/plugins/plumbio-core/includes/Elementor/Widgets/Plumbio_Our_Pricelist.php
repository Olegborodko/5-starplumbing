<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Plumbio_Our_Pricelist extends Widget_Base
{

    public function get_name()
    {
        return 'plumbio_our_pricelist';
    }

    public function get_title()
    {
        return esc_html__('Plumbio Our Pricelist', 'plumbio-core');
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
            'tag_line',
            [
                'label' => esc_html__('Tag Line', 'plumbio-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('our pricelist', 'plumbio-core'),
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'plumbio-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Hourly Rate Plumbing', 'plumbio-core'),
            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'plumbio-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('A plumber ranges from $45 to $200 per hour or more depending on the job, timing and location. According to project data from HomeAdvisor members, it ranges between $173 and $459 with an average cost of $316. Services may include drain cleaning, faucet replacement or installation, and toilet repair.', 'plumbio-core'),
                'placeholder' => esc_html__('Type your description here', 'plumbio-core'),

            ]
        );


        $this->add_control(
            'content_list',
            [
                'label' => esc_html__('Content List', 'plumbio-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('', 'plumbio-core'),
                'placeholder' => esc_html__('Type your description here', 'plumbio-core'),

            ]
        );


        $this->add_control(
            'table_notes',
            [
                'label' => esc_html__('Table Notes', 'plumbio-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('* Do take note that there may be additional charges for supplies and equipment.', 'plumbio-core'),
                'placeholder' => esc_html__('Type your description here', 'plumbio-core'),

            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('item', 'plumbio-core'),
            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'plumbio-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Work at Height', 'plumbio-core'),
            ]
        );


        $repeater->add_control(
            'item_price_per_hour',
            [
                'label' => esc_html__('Price Per Hour', 'plumbio-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$170 per hour*', 'plumbio-core'),
            ]
        );


        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'plumbio-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'plumbio-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'plumbio-core'),
                    ],
                   
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $tag_line = $settings["tag_line"];
        $heading = $settings["heading"];
        $description = $settings["description"];
        $content_list = $settings["content_list"];
        $table_notes = $settings["table_notes"];
    ?> 
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="blocktitle text-left">
                    <div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
                    <div class="blocktitle__title"><?php echo $heading; ?></div>
                </div>
                <p>
                    <?php echo $description; ?>
                </p>
                <ul class="tt-list tt-list__color01 tt-list_top03">
                    <?php echo $content_list; ?>
                </ul>
            </div>
            <div class="divider tt-visible__mobile"></div>
            <div class="col-md-6 col-lg-6">
                <table class="table-price">
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_title = $item["item_title"];
                            $item_price_per_hour = $item["item_price_per_hour"];
                        ?> 
                            <tr>
                                <td><?php echo $item_title; ?></td>
                                <td><?php echo $item_price_per_hour; ?></td>
                            </tr> 
                         <?php $i++;  } ?>
                    </tbody>
                </table>
                <div class="table__notes"><?php echo $table_notes; ?></div>
            </div>
        </div> 
        <?php  }
           

            protected function _content_template()
            {
            }
 }
