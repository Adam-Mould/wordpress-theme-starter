<?php
/**
 * Theme Customizer
 *
 * @package [Theme Name]
 */

final class Customizer {
	/**
	 * @var WP_Customize_Manager
	 */
	protected $wp_customize;	

	/**
	 * Construct Method.
	 */
	public function __construct() {

		add_action( 'customize_register' , array( $this , 'customize_register' ) );
	}

	/**
	 * Function to support WordPress Customizer
	 */
	public function customize_register( $wp_customize ) {

		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		$this->wp_customize = $wp_customize;

		$this->register_sections();
		$this->register_settings();
	}

	/**
	 * Add all sections to the customizer
	 */
	private function register_sections() {
		$this->section_social_media();
		$this->section_footer();
	}

	/**
	 * Add all settings to the customizer
	 * Called after sections, as we reference them
	 */
	private function register_settings() {
		$this->setting_contact_email();
		$this->setting_contact_telephone();
		$this->setting_address();
		$this->setting_google_analytics();
		$this->setting_social_media_links();
		$this->setting_footer_text();
	}

	public static function social_media_list() {
		return array(
			'linkedin',
			'google-plus',
		);
	}

	/**
	 * Sections
	 */
	private function section_social_media() {

		$this->wp_customize->add_section(
			'social_media', array(
				'title' 			=> __( 'Social Media', 'text-domain' ),
				'description' 		=> __( 'Add any relevant social media links to display them', 'text-domain' ),
				'priority'			=> 200
			)
		);
	}
	 
	private function section_footer() {

		$this->wp_customize->add_section(
			'footer', array(
				'title' => __( 'Footer', 'text-domain' ),
				'priority' => 205
			)
		);
	}

	/**
	 * Settings
	 */
	private function setting_contact_email() {

    $this->wp_customize->add_setting( 'contact_email' );

    $this->wp_customize->add_control(
      new WP_Customize_Control(
        $this->wp_customize, 'contact_email', array(
          'label'     => __( 'Company Contact Email', 'text-domain' ),
          'section'   => 'title_tagline',
          'type'      => 'text',
          'priority'  => 90
        )
      )
    );
	}

	private function setting_contact_telephone() {

    $this->wp_customize->add_setting( 'contact_telephone' );

    $this->wp_customize->add_control(
      new WP_Customize_Control(
        $this->wp_customize, 'contact_telephone', array(
          'label'     => __( 'Company Contact Telephone', 'text-domain' ),
          'section'   => 'title_tagline',
          'type'      => 'text',
          'priority'  => 91
        )
      )
    );
	}

	private function setting_address() {

    $this->wp_customize->add_setting( 'contact_address' );

    $this->wp_customize->add_control(
      new WP_Customize_Control(
        $this->wp_customize, 'contact_address', array(
          'label'     => __( 'Company Address', 'text-domain' ),
          'section'   => 'title_tagline',
          'type'      => 'textarea',
					'priority'  => 92
        )
      )
    );
	}

	private function setting_google_analytics() {

    $this->wp_customize->add_setting( 'google_analytics' );

    $this->wp_customize->add_control(
      new WP_Customize_Control(
        $this->wp_customize, 'google_analytics', array(
          'label'     => __( 'Google Analytics Tracking Code', 'text-domain' ),
          'section'   => 'title_tagline',
          'type'      => 'textarea',
          'rows'      => 5,
          'priority'  => 100
        )
      )
    );
	}

	private function setting_social_media_links() {

		$social_links = Customizer::social_media_list();
		$priority = 5;

		if ( count( $social_links ) > 0 ) {

			foreach ( $social_links as $social_network ) {

				$this->wp_customize->add_setting(
					$social_network, array(
						'sanitize_callback' => 'esc_url_raw'
					)
				);

				$this->wp_customize->add_control(
					$social_network, array(
						'label' 		=> ucwords($social_network),
						'section' 	=> 'social_media',
						'type' 			=> 'text',
						'priority'	=> $priority,
					)
				);

				$priority += 5;
			}
		}
	}

	private function setting_footer_text() {

		$this->wp_customize->add_setting( 'copyright_text' );

		$this->wp_customize->add_control(
			new WP_Customize_Control(
				$this->wp_customize, 'copyright_text', array(
					'label'          => __( 'Copyright Text', 'text-domain' ),
					'section'        => 'footer',
					'priority' 			 => 1,
					'type'           => 'textarea',
				)
			)
		);
	}
}

new Customizer();