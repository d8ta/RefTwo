<?php
namespace Project\Helpers;

class MenuHelper extends \A365\Wordpress\Helpers\MenuHelper
{
    private $_menu_name = "";

    public function getMenuItems( $menu_id, $tree = true )
    {
        $this->_menu_name = $menu_id;

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

                $children = $this->_buildTree( $elements, $element->ID, $level );
                if ( $children ) {
                    $element->submenu = $children;
                }

                $element->level = $level;
                $element->class = $class;
                $element->menu_name = $this->_menu_name;

                $branch[$element->ID] = $element;
                unset( $element );
            }
        }
        return $branch;
    }

}