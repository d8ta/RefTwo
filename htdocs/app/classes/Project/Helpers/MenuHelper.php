<?php
namespace Project\Helpers;

class MenuHelper extends \A365\Wordpress\Helpers\MenuHelper
{
    private $_with_submenu_div = false;
    private $_depth = 2;

    public function getMenuItems( $menu_id, $with_submenu_div = false, $depth = 2 )
    {
        $this->_with_submenu_div = $with_submenu_div;
        $this->_depth = $depth;

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_id ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_id ] );
            $menu_id = $menu->term_id;
        }
        
        $items = wp_get_nav_menu_items( $menu_id );
        return  $items ? $this->_buildTree( $items, 0 ) : null;
    }

    private function _buildTree( array &$elements, $parentId = 0, $level = 0)
    {
        $branch = array();
        $level += 1;
        $class = "";
            

        foreach ( $elements as &$element )
        {
            if ($element->object_id == get_the_ID()) {
                $class .= " active";
            }

            if ( $element->menu_item_parent == $parentId )
            {
                if ($level < $this->_depth) {
                    $children = $this->_buildTree( $elements, $element->ID, $level );
                    if ( $children) {
                        $element->submenu = $children;
                    }
                }

                $element->level = $level;
                $element->class = $class;
                $element->with_submenu_div = $this->_with_submenu_div;

                $branch[$element->ID] = $element;
                unset( $element );
            }
        }
        return $branch;
    }

}