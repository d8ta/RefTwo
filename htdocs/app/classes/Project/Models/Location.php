<?php 
namespace Project\Models;

class Location extends \A365\Wordpress\Models\Post {
    protected static $order = 'ASC';
    protected static $orderby = 'menu_order';


    public static function allPublishedByType($type) {

        $args = array(
            'posts_per_page' => -1,
            'post_type'     => 'location',
            'orderby'     => 'menu_order',
            'meta_query'    => array(
                array(
                'key'       => 'type',
                'value'     => $type,
                'compare'   => 'LIKE',
                ),
            ),
        );
        $the_query = new \WP_Query($args);
        $locations = $the_query->get_posts();

        foreach($locations as &$location) {
            $location = self::find($location->ID);
        }

        return $locations;

    }

    public function toArray() {

        $data = [
            'id' => $this->getId(),
            'post_title' => $this->getPostTitle(),
        ];
        $data = array_merge($data, $this->getMetaData());

        foreach ($data as $key => $value) {

            if(strpos($key, '_') === 0) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    public static function getDefault() {

        $location_id = pll_get_post(303);

        if ($location_id > 0) {
            return self::find($location_id);
        } else {
            return null;
        }
    }

    public static function getNearestId() {

        $nearestLocID = 0;
        $geo_activated = isset($_COOKIE['lat_geo']) && isset($_COOKIE['lng_geo']);
        $nearestLocCookieName = ($geo_activated) ? 'nearestLocationID_geo' : 'nearestLocationID_ip';

        if (!isset($_COOKIE[$nearestLocCookieName])) {

            $args = array(
                'posts_per_page' => -1,
                'post_type'     => 'location'
            );

            $the_query = new \WP_Query($args);
            $locations = $the_query->get_posts();

            if ($geo_activated) {
                $currentLat = $_COOKIE['lat_geo'];
                $currentLng = $_COOKIE['lng_geo'];
            } else {
                $currentLat = $_COOKIE['lat_ip'];
                $currentLng = $_COOKIE['lng_ip'];
            }
            

            $nearestDistance = 40000;

            foreach ($locations as $location) {
                $loc_data = get_field('location', $location->ID);
                $distance = self::distance($currentLat, $currentLng, $loc_data["lat"], $loc_data["lng"], "K");
                
                if ($distance < $nearestDistance) {
                    $nearestDistance = $distance;
                    $nearestLocID = $location->ID;
                }
            }
            if ($nearestLocID > 0) {
                $url = '/';
                $lang = pll_current_language('slug');
                if ($lang) {
                    $url .= $lang . '/';
                }
                setcookie($nearestLocCookieName, $nearestLocID, time() + 3600 * 24, $url );
            }
        } else {
            $nearestLocID = $_COOKIE[$nearestLocCookieName];
        }


        if ($nearestLocID > 0) {
            return $nearestLocID;
        } else {
            return null;
        }
    }

    public static function getNearest() {

        $nearestLocID = self::getNearestId();
        if ($nearestLocID){
            return self::find($nearestLocID);
        } else {
            return self::getDefault();
        }
    }


    private static function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
            return $miles;
          }
    }

}