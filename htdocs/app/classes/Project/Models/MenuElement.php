<?php
namespace Project\Models;

use A365\Wordpress\Models\Page;

class MenuElement
{

    public $level = 0;
    public $class = "";
    public $page_id;
    public $page;
    public $menu_item_parent;
    public $menu_item_id;
    public $with_submenu_div = false;
    public $title = "No Name";
    public $hash = null;
    public $submenu;

    public static function create($menu_item_id = 0, $level = 0, $config = array()) {
        $model = new static();

        $model->level = $level;

        $model->menu_item_id = $menu_item_id;
        
        if (isset($config["page_id"])) {
            $model->page_id = $config["page_id"];
            $model->page = Page::find($config["page_id"]);
        }

        if (isset($config["title"])) {
            $model->title = $config["title"];
        }

        if (isset($config["hash"])) {
            $model->hash = $config["hash"];
        }

        if (isset($config["menu_item_parent"])) {
            $model->menu_item_parent = $config["menu_item_parent"];
        }
        

        if (isset($config["active"]) && $config["active"]) {
            $model->class .= " active";
        }

        if (isset($config["with_submenu_div"])) {
            $model->with_submenu_div = $config["with_submenu_div"];
        }

        return $model;
    }

    public function addSubmenuPages($submenu_pages) {

        if (!$this->submenu) {
            $this->submenu = array();
        }
        $this->submenu = array_merge($this->submenu, $submenu_pages);

        if (empty($this->submenu)) {
            $this->submenu = null;
        }

        return $this;
    }

    public function addHashSections($hash_sections_raw, $level, $page_id) {

        if (!$hash_sections_raw) return;

        $hash_sections = array();

        foreach($hash_sections_raw as $hash_section) {
            $config = array();

            $config["active"] = false;
            $config["page_id"] = $page_id;
            $config["title"] = $hash_section->getHashCaption();
            $config["hash"] = $hash_section->getHashSlug();

            $hash_sections[] = MenuElement::create(-1, $level + 1, $config);
        }

        if (!$this->submenu) {
            $this->submenu = array();
        }

        $this->submenu = array_merge($this->submenu, $hash_sections);

        if (empty($this->submenu)) {
            $this->submenu = null;
        }

        return $this;
    }


    
}
