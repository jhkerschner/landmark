<?php
/**
 * Filter the_content, get_the_content, acf_the_content, and acf_get_content
 * to apply analytics event tracking to links within copy.
 */
add_filter('the_content', 'filter_items_in_content' ); 
add_filter('get_the_content', 'filter_items_in_content' ); 
add_filter('acf_the_content', 'filter_items_in_content');
add_filter('acf_get_content', 'filter_items_in_content');
function filter_items_in_content( $content ) {
    //remove image anchor tags around images.
    $content = preg_replace( array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img','" />'), $content );

    if($content !== '') :
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $links = $doc->getElementsByTagName('a');
        foreach ($links as $item) {
            if (!$item->hasAttribute('data-event-category')) :
                $event_category = 'In-Page Nav';
                $href = $item->getAttribute('href');
                $site_link = is_site_link($href);
                if(!$site_link) :
                  $event_category = 'External Link';
                endif;
                $item->setAttribute('data-event-category', $event_category);
                $item->setAttribute('data-event-action', 'Link Click');
            endif; 
        }
        $content=$doc->saveHTML();
        return preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $content));
    endif;

    return $content; 
}

/**
 * Provides the page title with tags stripped out. This is used to pass the page title to Google Analytics.
 * @param  integer $post_id
 * @param  boolean $echo
 */
function the_analytics_title($post_id = 0, $echo = true) {
    $title = ($post_id === 0) ? (strip_tags(get_the_title())) : (strip_tags(get_the_title($post_id)));

    if($echo) :
        echo strip_tags(get_the_title());
    else :
        return strip_tags(get_the_title($post_id));
    endif;
}

/**
 * Provides the ancestors for a page for analytic label purposes.
 * @param  integer $id   [description]
 * @param  boolean $echo [description]
 * @return [type]        [description]
 */
function the_ancestors_for_analytics($id=0, $echo = true) {
    if($id == 0):
        $id = get_the_ID();
    endif;
    $p = get_post($id);
    $ancestors = get_ancestors($p->ID, $p->post_type);
    $ancestors = array_reverse($ancestors);
    $str = '';
    foreach($ancestors as $a) :
        $str .= strip_tags(get_the_title($a).' | ');
    endforeach;

    if($echo) :
        echo $str;
    else: 
        return $str;
    endif;
}

/**
* Walker to add data attributes to the main and footer navs
**/
class nav_walker extends Walker_Nav_Menu {
  function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

    $attributes .= ' data-event-category="Main Navigation"';
    $attributes .= ' data-event-action="Nav Click"';
    $attributes .= ' data-event-label="'.apply_filters( 'the_title', $item->title, $item->ID ).'"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
