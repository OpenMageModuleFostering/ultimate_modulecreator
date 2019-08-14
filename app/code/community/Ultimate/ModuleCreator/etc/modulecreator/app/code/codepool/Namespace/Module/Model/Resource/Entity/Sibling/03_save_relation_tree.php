	/**
	 * Save {{entity}} - {{sibling}} relations
	 * @access public
	 * @param {{Namespace}}_{{Module}}_Model_{{Entity}} ${{entity}}
	 * @param array $data
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}_{{Sibling}}
	 * {{qwertyuiop}}
	 */
	public function save{{Entity}}Relation(${{entity}}, ${{sibling}}Ids){
		if (is_null(${{sibling}}Ids)){
			return $this;
		}
		$old{{Siblings}} = ${{entity}}->getSelected{{Siblings}}();
		$old{{Sibling}}Ids = array();
		foreach ($old{{Siblings}} as ${{sibling}}){
			$old{{Sibling}}Ids[] = ${{sibling}}->getId();
		}
		$insert = array_diff(${{sibling}}Ids, $old{{Sibling}}Ids);
		$delete = array_diff($old{{Sibling}}Ids, ${{sibling}}Ids);
		$write = $this->_getWriteAdapter();
		if (!empty($insert)) {
			$data = array();
			foreach ($insert as ${{sibling}}Id) {
				if (empty(${{sibling}}Id)) {
					continue;
				}
				$data[] = array(
					'{{sibling}}_id' => (int)${{sibling}}Id,
					'{{entity}}_id'  => (int)${{entity}}->getId(),
					'position'=> 1
				);
			}
			if ($data) {
				$write->insertMultiple($this->getMainTable(), $data);
			}
		}
		if (!empty($delete)) {
			foreach ($delete as ${{sibling}}Id) {
				$where = array(
					'{{entity}}_id = ?'  => (int)${{entity}}->getId(),
					'{{sibling}}_id = ?' => (int)${{sibling}}Id,
				);
				$write->delete($this->getMainTable(), $where);
			}
		}
		return $this;
	}
