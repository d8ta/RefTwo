<?php
namespace Project\Blocks\News;

class AbstractNews extends \A365\Wordpress\Block
{
	
	/**
	 * @var \Project\Models\News
	 */
	protected $_news;

	public function setNews(\Project\Models\News $news)
	{
		$this->_news = $news;
	}

	public function getNews()
	{
		return $this->_news;
	}
}
