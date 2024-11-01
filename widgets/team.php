<?php

namespace SimpleTeam\Widgets;

class Simple_Team_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'stw_team_widget';
	}

	public function get_title() {
		return esc_html__( 'Simple Team Widget', 'simple-team-addon' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'simple-team-addon-category' ];
	}

	public function get_keywords() {
		return [ 'team', 'team' ];
	}

  protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'simple-team-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// team layout
		$this->add_control(
			'team_layout',
			[
				'label' => esc_html__( 'Select Layout', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'team-style1',
				'options' => [
					'team-style1'  => esc_html__( 'Team Style 1', 'simple-team-addon' ),
					'team-style2'  => esc_html__( 'Team Style 2', 'simple-team-addon' ),
					'team-style3'  => esc_html__( 'Team Style 3', 'simple-team-addon' ),
					'team-style4'  => esc_html__( 'Team Style 4', 'simple-team-addon' ),
					'team-style5'  => esc_html__( 'Team Style 5', 'simple-team-addon' ),
					'team-style6'  => esc_html__( 'Team Style 6', 'simple-team-addon' ),
				],
			]
		);

		// Team Image
		$this->add_control(
			'stw_team_image',
			[
				'label' => esc_html__( 'Choose Image', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		// name
		$this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name', 'simple-team-addon' ),
				'placeholder' => esc_html__( 'Type your title here', 'simple-team-addon' ),
			]
		);

		// description
		$this->add_control(
			'team_desc',
			[
				'label' => esc_html__( 'Description', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Description', 'simple-team-addon' ),
				'placeholder' => esc_html__( 'Type your title here', 'simple-team-addon' ),
			]
			
		);

		// team social

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'stw_social_name',
			[
				'label' => esc_html__( 'Social Name', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'facebook', 'simple-team-addon' ),
				'placeholder' => esc_html__( 'Type your title here', 'simple-team-addon' ),
			]
		);

		$repeater->add_control(
			'stw_team_social_icon',
			[
				'label' => esc_html__( 'Icon', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);


		$repeater->add_control(
			'stw_team_social_link',
			[
				'label' => esc_html__( 'Link', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'simple-team-addon' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'stw_social_list',
			[
				'label' => esc_html__( 'Repeater List', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'stw_team_social_icon' => esc_html__( 'Icon', 'simple-team-addon' ),
					],
				],
				'title_field' => '{{{ stw_social_name }}}',
			]
		);

		$this->add_control(
			'stw_social_hide',
			[
				'label' => esc_html__( 'Social Hide?', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'simple-team-addon' ),
				'label_off' => esc_html__( 'Hide', 'simple-team-addon' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);



		
		$this->end_controls_section();

		// start style parts

			// Image
			$this->start_controls_section(
				'team_image_style',
				[
					'label' => esc_html__( 'Image', 'simple-team-addon' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'team_iamge_width',
				[
					'label' => esc_html__( 'Width', 'simple-team-addon' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .stw-team-thumb img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'team_height_width',
				[
					'label' => esc_html__( 'Height', 'simple-team-addon' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .stw-team-thumb img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'team_image_border',
					'label' => esc_html__( 'Border', 'simple-team-addon' ),
					'selector' => '{{WRAPPER}} .stw-team-thumb img',
				]
			);
	
			$this->add_control(
				'team_image_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'simple-team-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .stw-team-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);
	


			$this->end_controls_section();

		// Name
		$this->start_controls_section(
			'team_name_style',
			[
				'label' => esc_html__( 'Name', 'simple-team-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'team_name_color',
			[
				'label' => esc_html__( 'Text Color', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stw-team-data h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_name_typography',
				'selector' => '{{WRAPPER}} .stw-team-data h4',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'simple-team-addon' ),
				'selector' => '{{WRAPPER}} .stw-team-data h4',
			]
		);

		$this->end_controls_section();

		// Description
		$this->start_controls_section(
			'team_desc_style',
			[
				'label' => esc_html__( 'Description', 'simple-team-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'team_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stw-team-data p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_desc_typography',
				'selector' => '{{WRAPPER}} .stw-team-data p',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_desc_shadow',
				'label' => esc_html__( 'Text Shadow', 'simple-team-addon' ),
				'selector' => '{{WRAPPER}} .stw-team-data p',
			]
		);
		$this->end_controls_section();

		// Social
		$this->start_controls_section(
			'team_social_style',
			[
				'label' => esc_html__( 'Social', 'simple-team-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'simple-team-addon' ),
			]
		);

		$this->add_control(
			'icon_fill_color',
			[
				'label' => esc_html__( 'Color', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stw-team-social ul li a i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .stw-team-social ul li a path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_stroke_color',
			[
				'label' => esc_html__( 'Stroke Color', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stw-team-social ul li a path' => 'stroke: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'team_social_size',
			[
				'label' => esc_html__( 'Size', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .stw-team-social ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'simple-team-addon' ),
			]
		);
		$this->add_control(
			'icon_hover_fill_color',
			[
				'label' => esc_html__( 'Color', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stw-team-social ul li a:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .stw-team-social ul li a:hover path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_hover_stroke_color',
			[
				'label' => esc_html__( 'Stroke Color', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stw-team-social ul li a:hover path' => 'stroke: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_tabs();
		
		$this->end_controls_section();

		// content box
		$this->start_controls_section(
			'team_content_box_style',
			[
				'label' => esc_html__( 'Content Box', 'simple-team-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'team_content_box_background',
				'label' => esc_html__( 'Background', 'simple-team-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .stw-team-data',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'team_content_box_border',
				'label' => esc_html__( 'Border', 'simple-team-addon' ),
				'selector' => '{{WRAPPER}} .stw-team-data',
			]
		);

		$this->add_control(
			'team_content_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .stw-team-data' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);


		$this->add_control(
			'team_content_box_padding',
			[
				'label' => esc_html__( 'Padding', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .stw-team-data' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);


		$this->end_controls_section();

		// box
		$this->start_controls_section(
			'team_box_style',
			[
				'label' => esc_html__( 'Box', 'simple-team-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'content_box_tabs'
		);

		$this->start_controls_tab(
			'style_box_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'simple-team-addon' ),
			]
		);
		$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'team_box_background',
					'label' => esc_html__( 'Background', 'simple-team-addon' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .stw-team-item',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'team_box_border',
					'label' => esc_html__( 'Border', 'simple-team-addon' ),
					'selector' => '{{WRAPPER}} .stw-team-item',
				]
			);
	
		
			$this->add_control(
				'team_box_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'simple-team-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .stw-team-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'team_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'simple-team-addon' ),
					'selector' => '{{WRAPPER}} .stw-team-item',
				]
			);
	
			$this->add_control(
				'team_box_padding',
				[
					'label' => esc_html__( 'Padding', 'simple-team-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .stw-team-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);
			

		$this->add_control(
			'team_social_size',
			[
				'label' => esc_html__( 'Size', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .stw-team-social ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'team_box_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'simple-team-addon' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'team_box_hover_background',
				'label' => esc_html__( 'Background', 'simple-team-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .stw-team-item:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'team_box_hover_border',
				'label' => esc_html__( 'Border', 'simple-team-addon' ),
				'selector' => '{{WRAPPER}} .stw-team-item:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_box_hover_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'simple-team-addon' ),
				'selector' => '{{WRAPPER}} .stw-team-item:hover',
				'separator' => 'before'
			]
			
		);
		$this->end_controls_tabs();
		
		$this->end_controls_section();

	}

  protected function render() {
    $settings = $this->get_settings_for_display();
		$team_layout = $settings['team_layout'];
		$stw_team_image = $settings['stw_team_image'];
		$team_name = $settings['team_name'];
		$team_desc = $settings['team_desc'];
		$stw_social_list = $settings['stw_social_list'];
		$stw_social_hide = $settings['stw_social_hide'];

		switch($team_layout){
			case 'team-style1':
				include( __DIR__ . '/parts/team-style1.php' );
				break;
				case 'team-style2':
				include( __DIR__ . '/parts/team-style2.php' );
				break;
				case 'team-style3':
				include( __DIR__ . '/parts/team-style3.php' );
				break;
				case 'team-style4':
				include( __DIR__ . '/parts/team-style4.php' );
				break;
				case 'team-style5':
				include( __DIR__ . '/parts/team-style5.php' );
				break;
				case 'team-style6':
				include( __DIR__ . '/parts/team-style6.php' );
				break;
        default:
				include( __DIR__ . '/parts/team-style1.php' );
    }

		}
}

