<?php

//header top information
function header_top_info(){
      new \Kirki\Panel(
            'header_info',
            [
                  'priority'    => 10,
                  'title'       => esc_html__( 'Theme Options', 'harry' ),
                  'description' => esc_html__( 'Here you can add your header info.', 'harry' ),
            ]
      );
      
      new \Kirki\Section(
            'header_section_info',
            [
                  'title'       => esc_html__( 'Header Top Info', 'harry' ),
                  'description' => esc_html__( 'Header section Info here.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );
      
      new \Kirki\Field\Text(
            [
                  'settings' => 'header_email',
                  'label'    => esc_html__( 'Email', 'harry' ),
                  'section'  => 'header_section_info',
                  'default'  => esc_html__( 'info@example.com', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'header_phone',
                  'label'    => esc_html__( 'Phone', 'harry' ),
                  'section'  => 'header_section_info',
                  'default'  => esc_html__( '+964 742 44 763', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Textarea(
            [
                  'settings'    => 'header_time',
                  'label'       => esc_html__( 'Time', 'harry' ),
                  'section'     => 'header_section_info',
                  'default'     => esc_html__( 'Sunday-Thures 10am-07pm', 'harry' ),
            ]
      );
}
header_top_info();
//header top information
function header_version_select(){
    
      new \Kirki\Section(
            'harry__header_section_info',
            [
                  'title'       => esc_html__( 'Choose Header', 'harry' ),
                  'description' => esc_html__( 'Choose Header section.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );
      new \Kirki\Field\Select(
            [
                  'settings'    => 'header_select',
                  'label'       => esc_html__( 'Select Header', 'harry' ),
                  'section'     => 'harry__header_section_info',
                  'default'     => 'header-01',
                  'placeholder' => esc_html__( 'Choose an option', 'harry' ),
                  'choices'     => [
                        'header-01' => esc_html__( 'Header 01', 'harry' ),
                        'header-02' => esc_html__( 'Header 02', 'harry' ),
                        'header-03' => esc_html__( 'Header 03', 'harry' ),
                        'header-04' => esc_html__( 'Header 04', 'harry' ),
                        'header-05' => esc_html__( 'Header 05', 'harry' )
                  ],
            ]
      );
      
}
header_version_select();
//header logo information
function header_logo_info(){
    
      
      new \Kirki\Section(
            'header_logo_section_info',
            [
                  'title'       => esc_html__( 'Header Logo', 'harry' ),
                  'description' => esc_html__( 'Header section Info here.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );

      new \Kirki\Field\Image(
            [
                  'settings'    => 'header_logo',
                  'label'       => esc_html__( 'Logo', 'harry' ),
                  'description' => esc_html__( 'Update your logo.', 'harry' ),
                  'section'     => 'header_logo_section_info',
                  'default'     => get_template_directory_uri().'/assets/img/logo/logo-black.svg'
            ]
      );
      new \Kirki\Field\Image(
            [
                  'settings'    => 'header_search_logo',
                  'label'       => esc_html__( 'Serach Logo', 'harry' ),
                  'description' => esc_html__( 'Update Serach Template Logo.', 'harry' ),
                  'section'     => 'header_logo_section_info',
                  'default'     => get_template_directory_uri().'/assets/img/logo/logo.svg'
            ]
      );
      new \Kirki\Field\Image(
            [
                  'settings'    => 'off_canvas_header_logo',
                  'label'       => esc_html__( 'Off Canvas Logo', 'harry' ),
                  'description' => esc_html__( 'Update your logo.', 'harry' ),
                  'section'     => 'header_logo_section_info',
                  'default'     => get_template_directory_uri().'/assets/img/logo/logo-black.svg'
            ]
      );
      
    
}
header_logo_info();


//header off canvas information
function header_off_canvas_info(){
    
      
      new \Kirki\Section(
            'header_off_canvas_section_info',
            [
                  'title'       => esc_html__( 'Header Off Canvas', 'harry' ),
                  'description' => esc_html__( 'Header Off Canvas Info here.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'off_canvas_button',
                  'label'    => esc_html__( 'Off Canvas Button', 'harry' ),
                  'section'  => 'header_off_canvas_section_info',
                  'default'  => esc_html__( 'Get Started', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'off_canvas_button_url',
                  'label'    => esc_html__( 'Off Canvas Button Url', 'harry' ),
                  'section'  => 'header_off_canvas_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Checkbox_Switch(
            [
                  'settings'    => 'button_off_on',
                  'label'       => esc_html__( 'Button Hide/Show', 'harry' ),
                  'description' => esc_html__( 'Simple switch control', 'harry' ),
                  'section'     => 'header_off_canvas_section_info',
                  'default'     => 'on',
                  'choices'     => [
                        'on'  => esc_html__( 'Enable', 'harry' ),
                        'off' => esc_html__( 'Disable', 'harry' ),
                  ],
            ]
      );
      new \Kirki\Field\Checkbox_Switch(
            [
                  'settings'    => 'off_canvas_shape_off_on',
                  'label'       => esc_html__( 'Offcanvas Shape Hide/Show', 'harry' ),
                  'description' => esc_html__( 'Simple switch control', 'harry' ),
                  'section'     => 'header_off_canvas_section_info',
                  'default'     => 'on',
                  'choices'     => [
                        'on'  => esc_html__( 'Enable', 'harry' ),
                        'off' => esc_html__( 'Disable', 'harry' ),
                  ],
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'off_canvas_email',
                  'label'    => esc_html__( 'Off Canvas Email', 'harry' ),
                  'section'  => 'header_off_canvas_section_info',
                  'default'  => esc_html__( 'info@example.com', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'off_canvas_phone',
                  'label'    => esc_html__( 'Off Canvas Phone', 'harry' ),
                  'section'  => 'header_off_canvas_section_info',
                  'default'  => esc_html__( '+964 742 44 763', 'harry' ),
                  'priority' => 10,
            ]
      );
      
    
}
header_off_canvas_info();

//header off canvas Social information
function header_off_canvas_social_info(){
    
      
      new \Kirki\Section(
            'header_off_canvas_social_section_info',
            [
                  'title'       => esc_html__( 'Socail Info', 'harry' ),
                  'description' => esc_html__( 'Socail Info here.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );
      new \Kirki\Field\Checkbox_Switch(
            [
                  'settings'    => 'harry_social_off_on_btn',
                  'label'       => esc_html__( 'Social Hide/Show', 'harry' ),
                  'description' => esc_html__( 'Simple switch control', 'harry' ),
                  'section'     => 'header_off_canvas_social_section_info',
                  'default'     => 'on',
                  'choices'     => [
                        'on'  => esc_html__( 'Enable', 'harry' ),
                        'off' => esc_html__( 'Disable', 'harry' ),
                  ],
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_facebook',
                  'label'    => esc_html__( 'Facebook Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_youtube',
                  'label'    => esc_html__( 'Youtube Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_twitter',
                  'label'    => esc_html__( 'Twitter Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_instagram',
                  'label'    => esc_html__( 'Instagram Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_linkedin',
                  'label'    => esc_html__( 'Linkedin Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_vimeo',
                  'label'    => esc_html__( 'Vimeo Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'harry_github',
                  'label'    => esc_html__( 'github Url', 'harry' ),
                  'section'  => 'header_off_canvas_social_section_info',
                  'default'  => esc_html__( '#', 'harry' ),
                  'priority' => 10,
            ]
      );
     
}
header_off_canvas_social_info();


//Footer copyright
function footer_copyright(){
    
      
      new \Kirki\Section(
            'footer_copyright_section',
            [
                  'title'       => esc_html__( 'Footer Copyright', 'harry' ),
                  'description' => esc_html__( 'Footer Copyright Info here.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );
      new \Kirki\Field\Text(
            [
                  'settings' => 'footer_copyright_text',
                  'label'    => esc_html__( 'Footer Copyright Text', 'harry' ),
                  'section'  => 'footer_copyright_section',
                  'default'  => esc_html__( '© 2022 Harry All Rights Reserved.', 'harry' ),
                  'priority' => 10,
            ]
      );   
}
footer_copyright();
//Breadcrumb  banner image
function harry_breadcrumb_banner_image(){
    
      
      new \Kirki\Section(
            'harry_breadcrumb_image',
            [
                  'title'       => esc_html__( 'Breadcrumb Background Image', 'harry' ),
                  'description' => esc_html__( 'Breadcrumb Bg Image here.', 'harry' ),
                  'panel'       => 'header_info',
                  'priority'    => 160,
            ]
      );
      new \Kirki\Field\Image(
            [
                  'settings'    => 'breadcrumb_banner_mage',
                  'label'       => esc_html__( 'Breadcrumb Banner Image', 'harry' ),
                  'description' => esc_html__( 'Update Breadcrumb Background Image.', 'harry' ),
                  'section'     => 'harry_breadcrumb_image',
            ]
      );  
}
harry_breadcrumb_banner_image();