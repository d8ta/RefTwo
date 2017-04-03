<?php 
namespace Project\Models;
use Project\Application as App;

class Filter {

	protected static $acf = '';

   private $choices;
   private $industry;
   private $filterOutKeys = array( 'choices', 'key', 'name', 'label', 'conditional_logic' );

	public function __construct() {

		$obj = App::getInstance()->getConfig('acf');
		static::$acf = $obj['groups']['project-settings']['fields'];

	}

	public function getObject() {

		echo '<pre>' . var_export(static::$acf, true) . '</pre>';

		return static::$acf;
	}

   public function getArrIdxbyFieldkey($key) {

      $idx = array_search($key, array_column(static::$acf, 'key'));

      return $idx;
   }

   public function getArrIdxbyName($name) {

      $idx = array_keys(array_column(static::$acf, 'name'), $name);

      return $idx;
   }

   public function getArraybyName($name) {

      $idx = $this->getArrIdxbyName($name);
      $arr = array();

      foreach($idx as $idx) {
         array_push($arr, static::$acf[$idx]);
      }

      return $arr;
   
   }

   public function getIndustry() {

      $this->industry = array();

      $tmp = $this->getArraybyName('industry');

      $this->industry = array_intersect_key($tmp, array_flip($this->filterOutKeys));

      return $this->industry;

   }  

   public function getProductsOf($industry) {

      $allProducts = $this->getArraybyName('products');
      $product = array();

      foreach($allProducts as $pdt) {
         if($pdt['conditional_logic'][0][0]['value'] === $industry) {
            array_push($product, $pdt);
            break;
         }
      }

      return $product;

   }
                                     


}