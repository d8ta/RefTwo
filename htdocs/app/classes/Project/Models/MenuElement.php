<?php
namespace Project\Models;

use A365\Wordpress\Models\Post;

class MenuElement
{

    public $level = 0;
    public $class = "";
    public $type = "post_type";
    public $post_id;
    public $post;
    public $link;
    public $menu_item_parent;
    public $menu_item_id;
    public $with_submenu_div = false;
    public $title = "No Name";
    public $submenu;

    public static function create($menu_item_id = 0, $level = 0, $config = array()) {
        $model = new static();

        $model->level = $level;

        $model->menu_item_id = $menu_item_id;
        if (isset($config["type"])) {
            $model->type = $config["type"];
        }
        
        if ($model->type == "post_type" && isset($config["post_id"])) {
            $model->post_id = $config["post_id"];
            $model->post = Post::find($model->post_id);
            $model->link = get_permalink(pll_get_post($model->post->getId()));
            if (isset($config["hash"])) {
                $model->link .= $config["hash"];
            }
        } else if ($model->type == "custom") {
            $model->link = $config["link"];
        }

        if (isset($config["title"])) {
            $model->title = $config["title"];
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

    public function addHashSections($hash_sections_raw, $level, $post_id, $prepend = false) {

        if (!$hash_sections_raw) return;

        $hash_sections = array();

        foreach($hash_sections_raw as $hash_section) {
            $config = array();

            $config["active"] = false;
            $config["post_id"] = $post_id;
            $config["title"] = $hash_section->getHashCaption();
            $config["hash"] = $hash_section->getHashSlug();

            $hash_sections[] = MenuElement::create(-1, $level + 1, $config);
        }

        if (!$this->submenu) {
            $this->submenu = array();
        }
        if ($prepend) {
            $this->submenu = array_merge($hash_sections, $this->submenu);
        } else {
            $this->submenu = array_merge($this->submenu, $hash_sections);
        }
        

        if (empty($this->submenu)) {
            $this->submenu = null;
        }

        return $this;
    }


    
}
