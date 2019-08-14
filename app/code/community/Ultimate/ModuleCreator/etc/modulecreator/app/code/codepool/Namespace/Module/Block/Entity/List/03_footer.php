		;
		${{entities}}->setOrder('{{nameAttribute}}', 'asc');
		$this->set{{Entities}}(${{entities}});
	}
	/**
	 * prepare the layout
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_{{Entity}}_List
	 * {{qwertyuiop}}
	 */
	protected function _prepareLayout(){
		parent::_prepareLayout();
		$pager = $this->getLayout()->createBlock('page/html_pager', '{{module}}.{{entity}}.html.pager')
			->setCollection($this->get{{Entities}}());
		$this->setChild('pager', $pager);
		$this->get{{Entities}}()->load();
		return $this;
	}
	/**
	 * get the pager html
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getPagerHtml(){
		return $this->getChildHtml('pager');
	}
}