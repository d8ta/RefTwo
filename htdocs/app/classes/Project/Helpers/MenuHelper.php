<?php
namespace Project\Helpers;

use A365\Wordpress\Models\Page;
use Project\Models\MenuElement;

class MenuHelper extends \A365\Wordpress\Helpers\MenuHelper
{
    private $_with_submenu_div = false;
    private $_depth = 2;
    private $_elements = array();

    public function getMenuItems( $menu_id, $config = array() )
    {
        
        if (isset($config["with_submenu_div"])) {
            $this->_with_submenu_div = $config["with_submenu_div"];
        }
        if (isset($config["depth"])) {
            $this->_depth = $config["depth"];
        }

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_id ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_id ] );
            $menu_id = $menu->term_id;
        }

        $this->_elements = wp_get_nav_menu_items( $menu_id );
        return  $this->_elements ? $this->_buildTree() : null;
    }

    private function _buildTree($parentMenuElement = null, $level = 0)
    {
        $branch = array();
        $level += 1;

        if (!$parentMenuElement) {
            $parentMenuElement = MenuElement::create(0, $level);
        }
        
        foreach ( $this->_elements as &$element ) {


            if ( $element->menu_item_parent == $parentMenuElement->menu_item_id )
            {
                $config = array();

                $config["active"] = ($element->object_id == get_the_ID());
                $config["type"] = $element->type;
                $config["link"] = $element->url;
                $config["post_id"] = $element->object_id;
                
                $config["menu_item_parent"] = $element->menu_item_parent;
                $config["with_submenu_div"] = $this->_with_submenu_div;
                $config["title"] = $element->title;
                
                $menuElement = MenuElement::create($element->ID, $level, $config);

                if ($level < $this->_depth) {
                    $prepend = (pll_get_post($element->object_id, 'de') == 29); // kontaktseite
                    $menuElement->addSubmenuPages($this->_buildTree($menuElement, $level ));
                    $menuElement->addHashSections(Page::find($element->object_id)->getHashSections(), $level, $element->object_id, $prepend);
                }

                $element = $menuElement;

                $branch[$element->menu_item_id] = $element;
                unset( $element );
            }
        }
        return $branch;
    }

}