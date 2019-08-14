	/**
	 * check if the rss for {{entityLabel}} is enabled
	 * @access public
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function isRssEnabled(){
		return  Mage::getStoreConfigFlag('rss/config/active') && Mage::getStoreConfigFlag('{{module}}/{{entity}}/rss');
	}
	/**
	 * get the link to the {{entityLabel}} rss list
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getRssUrl(){
		return Mage::getUrl('{{module}}/{{entity}}/rss');
	}
