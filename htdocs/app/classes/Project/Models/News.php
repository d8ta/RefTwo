<?php 
namespace Project\Models;

class News extends \A365\Wordpress\Models\Post {

	protected static $order = 'ASC';
	protected static $orderby = 'menu_order';

}