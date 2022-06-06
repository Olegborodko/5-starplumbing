<?php
namespace Plumbio\Helper\Elementor;

use Elementor\Plugin;

class Element {


	public function __construct() {
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ) );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
	}
	public function widgets_registered() {
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Banner_Slider() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AboutCompany() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ServiceBanner() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Contact() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PlumbioService() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Service_Tab() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\OurApproach() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\WhyChooseUs() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\MissionStatement() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AdditionalServiceSlider() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\WorkPlan() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_FAQ() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PlumbioTestimonial() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\EmergencyService() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PlumbioBlog() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\FAQ_Contact() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Special_Offers() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Service_Plans() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Team() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_About() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Choose() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Company_RSF() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Certificates() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Impacts_Cost() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Areas_Cover() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Coverage_Location() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CustomerReview() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\VideoSlider() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PlumbioFooter() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PlumbioBrand() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\SidebarNavContact() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\RequestQuote() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Offer() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ServiceTab_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\RepairTab() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\PlumbioListWidget() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\SidebarContactForm() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ServiceSidebarContact() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ServiceHeading() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Service_Thumbnail() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ServiceBottomBanner() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CommericialProject() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CommericialProject() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ProjectGallery() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Our_Pricelist() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Client_Review() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Plumbio_Product_Grid() );

	}
	function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'plumbio',
			array(
				'title' => __( 'Plumbio', 'plumbio-core' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}
}
