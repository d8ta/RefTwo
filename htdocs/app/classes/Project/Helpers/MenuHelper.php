<?php
namespace Project\Helpers;

class MenuHelper extends \A365\Wordpress\Helpers\MenuHelper
{

    public function getMenuItems( $menu_id, $tree = true )
    {
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_id ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_id ] );
            $menu_id = $menu->term_id;
        }
        
        $items = wp_get_nav_menu_items( $menu_id );
        return  $items ? $this->_buildTree( $items, 0 ) : null;
    }

    private function _buildTree( array &$elements, $parentId = 0, $level = 0 )
    {
        $branch = array();
        $level += 1;
        foreach ( $elements as &$element )
        {
            if ( $element->menu_item_parent == $parentId )
            {
                $children = $this->_buildTree( $elements, $element->ID, $level );
                if ( $children ) {
                    $element->submenu = $children;
                    $element->level = $level;
                }


                $branch[$element->ID] = $element;
                unset( $element );
            }
        }
        return $branch;
    }

}