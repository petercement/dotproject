<?php
/**
 * Abstract factory for DP_View objects
 * 
 * This class defines static methods for creating DP_View objects.
 *
 * @package dotproject
 * @subpackage system
 * @version not.even.alpha
 * @todo Possibly include the object dimensions in the constructor of view objects.
 */
class DP_View_Factory {
	
	/**
	 * Instantiate and return a DP_View_List object
	 * 
	 * @param string $id Unique identifier to use for the product.
	 * @param DP_List_Source_Interface $listobj The data source for this view.
	 */
	public static function getListView($id) {
		return new DP_View_List($id);
	}

	/**
	 * Instantiate and return a DP_View_TabBox object.
	 */
	public static function getTabBoxView($id) {
		return new DP_View_TabBox($id);
	}
	
	/**
	 * Instantiate and return a DP_View_SearchFilter object.
	 */
	public static function getSearchFilterView($id) {
		return new DP_View_SearchFilter($id, $filter);
	}
	
	/**
	 * Instantiate and return a DP_View_SelectFilter object.
	 */
	public static function getSelectFilterView($id, $options, $label) {
		return new DP_View_SelectFilter($id, $options, $label);
	}

	public static function getRowIterator($id) {
		return new DP_View_RowIterator($id);
	}
	
	public static function getPagerView($id) {
		return new DP_View_Pager($id);
	}

	public static function getTitleBlockView($id, $title = '', $icon = '', $module = '', $helpref = '') {
		return new DP_View_TitleBlock($id, $title, $icon, $module, $helpref);
	}
}
?>