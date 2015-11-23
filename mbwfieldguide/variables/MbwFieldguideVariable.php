<?php
namespace Craft;

class MbwFieldguideVariable {

	public function getBlockTypes($fieldId) 
	{
		$blockTypesByField = craft()->matrix->getBlockTypesByFieldId($fieldId);
		
		$blockTypes = array();

		foreach($blockTypesByField as $blockType) {

			array_push($blockTypes, array(
				'name'   => $blockType->getAttribute('name'),
				'handle' => $blockType->getAttribute('handle'),
				'fields' => $blockType->getFields()
			));
		}

		return $blockTypes;
	}

	public function getUnusedFieldIds() 
	{
		// all field ids
		$query = craft()->db->createCommand();
		$allFieldIds = $query
			->select('craft_fields.id')
			->from('fields')
			->order('craft_fields.id')
			->queryAll();
		$allFieldIds = self::array_flatten($allFieldIds);
		
		// used field ids
		$query = craft()->db->createCommand();
		$query->distinct = true;
		$usedFieldIds = $query
			->select('craft_fieldlayoutfields.fieldId')
			->from('fieldlayoutfields')
			->order('craft_fieldlayoutfields.fieldId')
			->queryAll();
		$usedFieldIds = self::array_flatten($usedFieldIds);
		
		// unused field ids
		$unusedFieldIds = array_diff($allFieldIds, $usedFieldIds);
		
		return $unusedFieldIds;
	}
	
	private function array_flatten($arr) {
		$arr = array_values($arr);
		while (list($k,$v)=each($arr)) {
			if (is_array($v)) {
				array_splice($arr,$k,1,$v);
				next($arr);
			}
		}
		return $arr;
	}

}