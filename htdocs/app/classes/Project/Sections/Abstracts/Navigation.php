<?php
namespace Project\Sections\Abstracts;

use A365\Wordpress\Models\Page;
use A365\Wordpress\Models\Section;

class Navigation extends \A365\Wordpress\Block\AcfBlock
{

	private $currentPage;

	public function getItems()
	{
		$locations = get_nav_menu_locations();
		$items = wp_get_nav_menu_items( $locations['primary'] );


		foreach ($items as &$item) {
			$item->page = Page::find( $item->object_id );
			$item->currentPage = $this->getCurrentPage();

			$sections = [];

			foreach ($item->page->getSections() as $section) {
				$metaData = $section->getMetaData();

				$content = $metaData['content'][0];
				$layout  = $content['acf_fc_layout'];

				switch ($layout) {
					case 'service-teaser':
						$list = 'services';
						$key = 'title';
						break;

					case 'steps':
						$list = 'steps';
						$key = 'hash';
						break;
					
					default:
						$list = false;
						break;
				}

				if ($list) {
					foreach ($content[$list] as $subsectionData) {

						$subsection = new Section();

						$subsection->addMetaData( 'has_hash' , 1 );
						$subsection->addMetaData( 'hash_caption' , $subsectionData[$key] );

						$sections[] = $subsection;

					}
				}

				$sections[] = $section;


			}

			$item->sections = $sections;

		}

		return $items;
	}

	protected function getCurrentPage()
	{
		if (!$this->currentPage) {
			$this->currentPage = Page::getCurrent();
		}
		return $this->currentPage;
	}
}
