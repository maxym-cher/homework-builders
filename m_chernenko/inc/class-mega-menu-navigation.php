<?php

/**
 * Class Walker_Navigation
 */

class Mega_Menu_Navigation extends Walker_Nav_Menu {
	
	/**
	 * Adds custom class to dropdown menu for foundation dropdown script
	 */

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"menu submenu\">\n";
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $menu_image = get_field('category_image', 'term_'.$item->object_id);
        $overlay_color = get_field('overlay_color', $item);
        $indent = str_repeat( "\t", $depth );
        if ($menu_image) {
            $output .= "\n$indent<li class='sub-image-list'>\n";
            $output .=  "\n$indent<div class='sub-image-wrap'>\n";
            $output .=  "\n$indent<img alt='test' src='$menu_image'>\n";
            $output .=  "\n$indent<div class='sub-image-list-overlay' style='background-color: $overlay_color'>\n";
            $output .=  "\n$indent</div>\n";
            $output .=  "\n$indent</div>\n";
            $output .=  "\n$indent<div>\n";
            $output .=  "\n$indent<a href='$item->url'>$item->title</a>\n";
            $output .=  "\n$indent<p>$item->description</p>\n";
            $output .=  "\n$indent</div>\n";
        } else {
            $output .= "\n$indent<li><a href='$item->url'>$item->title</a>";
        }
    }
	/**
	 * Adds custom class to parent item with dropdown menu
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'has-dropdown';
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}


add_filter( 'megamenu_walker_class', 'custom_max_mega_menu_walker' );

function custom_max_mega_menu_walker( $walker_class ) {
    // Use your custom walker class
    return 'Mega_Menu_Navigation';
}