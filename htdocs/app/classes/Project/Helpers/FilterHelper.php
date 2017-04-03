<?php
namespace Project\Helpers;

class FilterHelper extends \A365\Core\Abstracts\Helper
{
	

	public static function getProductsChoices($industry){

		if($industry === 'architecture') {
			return [
				'concrete_skin' => 'concrete skin',
		        'oeko_skin' => 'öko skin',
		        'formparts' => 'formparts',
		        'fins' => 'fins',
		        'cast' => 'cast',
	        ];
	    }
	    else if($industry === 'infrastructure'){
	    	return [
	    		'gerade_wand' => 'Gerade Wand',
                'rieder_niedrige_lsw' => 'Rieder 360 Niedrige LSW',
                'grosser_bogen' => 'Großer Bogen',
                'rieton_gleisabsorber' => 'Rieton Gleisabsorber',
                'kleiner_bogen' => 'Kleiner Bogen',
                'aufsatzelement' => 'Aufsatzelement',
                'wandverkleidung' => 'Wandverkleidung',
                'leitwand_aufsatz' => 'Leitwand mit Aufsatz',
                'stuetzwand' => 'Stützwand',
                'leitwand' => 'Leitwand',
                'tunnel' => 'Tunnel',
                'konstruktive_fertigteile' => 'Konstruktive Fertigteile',
                'furniture' => 'Furniture',
                'bahnprodukte' => 'Bahnprodukte',
                'hochwasserschutz' => 'Hochwasserschutz',
                'rieder_bloc' => 'Rieder Bloc',
	    	];
	    }
	}


	public static function getApplicationChoices($industry){ 
		if($industry === 'architecture') {
			return [
				'fassade' => 'Fassade',
                'interior' => 'Interior',
                'dach' => 'Dach',
                'boden' => 'Boden',
                'spezial' => 'Spezial',
                'sonstige' => 'Sonstige',
	        ];
	    }
	    else if($industry === 'infrastructure'){
	    	return [
	    		'strasse' => 'Straße',
                'bahn' => 'Bahn',
                'industrie' => 'Industrie',
                'sonstige' => 'Sonstige',
	    	];
	    }
	}

	public static function getObjecttypeChoices() {
		return [
			'wohnbau' => 'Wohnbau',
            'privat' => 'Privat',
            'buero_verwaltung' => 'Büro & Verwaltung',
            'oeffentliche_bauten' => 'Öffentliche Bauten',
            'industrie' => 'Industrie',
            'handel_verkauf' => 'Handel & Verkauf',
            'hotels_gastronomie' => 'Hotels & Gastronomie',
            'bildung_forschung' => 'Bildung & Forschung',
            'kultur' => 'Kultur',
            'sakralbauten' => 'Sakralbauten',
            'sport_freizeit' => 'Sport & Freizeit',
            'gesundheitswesen' => 'Gesundheitswesen',
            'infrastruktur' => 'Infrastruktur',
            'messen_kunst' => 'Messen & Kunst',
            'sonstige' => 'Sonstige',
		];
	}

	public static function getFixationChoices() {
		return [
			'nieten' => 'Nieten',
            'schrauben' => 'Schrauben',
            'kleben' => 'Kleben',
            'hinterschnitt' => 'Hinterschnitt',
            'rieder_power_anchor' => 'Rieder Power Anchor',
            'spezial' => 'Spezial',
		];
	}

	public static function getColorsChoices() {
		return [
			'polar_white' => 'Polar White',
            'off_white' => 'Off-White',
            'elfenbein' => 'Elfenbein',
            'silbergrau' => 'Silbergrau',
            'chrome' => 'Chrome',
            'anthrazit' => 'Anthrazit',
            'liquide_black' => 'Liquide Black',
            'sahara' => 'Sahara',
            'sandstein' => 'Sandstein',
            'terra' => 'Terra',
            'terracotta' => 'Terracotta',
            'green' => 'Green',
		];
	}
}