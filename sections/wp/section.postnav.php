<?php
/*
	Section: PostNav
	Author: PageLines
	Author URI: http://www.pagelines.com
	Description: Paginates posts, shows a numerical post navigation
	Class Name: PageLinesPostNav
	Tags: internal
*/

class PageLinesPostNav extends PageLinesSection {

   function __construct( $registered_settings = array() ) {
	
		$name = __('Post Navigation', 'pagelines');
		$id = 'postnav';
	
		
		$default_settings = array(
			'type' 			=> 'main',
			'description' 	=> 'Post Navigation - Shows titles for next and previous post.',
			'workswith' 	=> array('main'),
			'failswith'		=> pagelines_special_pages(),
			'icon'			=> PL_ADMIN_ICONS . '/map.png'
		);
		
		$settings = wp_parse_args( $registered_settings, $default_settings );
		parent::__construct($name, $id, $settings);    

   }

   function section_template() { 
	pagelines_register_hook( 'pagelines_section_before_postnav' ); // Hook 
	
	?>
		<div class="post-nav fix"> 
			<span class="previous"><?php previous_post_link('%link') ?></span> 
			<span class="next"><?php next_post_link('%link') ?></span>
		</div>
<?php pagelines_register_hook( 'pagelines_section_after_postnav' ); // Hook 

	}

}

/*
	End of section class
*/