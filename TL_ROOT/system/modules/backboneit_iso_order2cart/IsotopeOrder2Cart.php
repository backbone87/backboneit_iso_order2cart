<?php

class IsotopeOrder2Cart extends Controller {
	
	const SUBMIT_TOKEN = 'bbit_iso_order2cart';
	
	const INSERT_TAG_ORDER2CART = 'cache_bbit_iso_order2cart';
	
	public function hookReplaceInsertTags($strTag) {
		list($strTag, $strLabel, $strUID, $intJumpTo) = explode('::', $strTag, 3);
		if($strTag != self::INSERT_TAG_ORDER2CART) {
			return false;
		}
		
		$objOrder = new IsotopeOrder();
		strlen($strUID) || $strUID = $this->Input->get('uid');
		if(!strlen($strUID) || !$objOrder->findBy('uniqid', $strUID)) {
			return false;
		}
		
		$intJumpTo && $objPage = $this->getPageDetails($intJumpTo);
		$objPage || $objPage = $GLOBALS['objPage'];
		$strAction = $this->generateFrontendUrl($objPage->row());
		
		strlen($strLabel) || $strLabel = $GLOBALS['TL_LANG']['MSC']['bbit_iso_order2cart_submit'];
		
		return '
<form action="' . $strAction . '" enctype="application/x-www-form-urlencoded" method="post">
<input type="hidden" name="REQUEST_TOKEN" value="' . REQUEST_TOKEN . '" />
<input type="hidden" name="FORM_SUBMIT" value="' . self::SUBMIT_TOKEN . '" />
<input type="hidden" name="order" value="' . $objOrder->uniqid . '" />
<input type="submit" name="submit" value="' . specialchars($strLabel) . '" />
</form>';
	}
	
	protected function __construct() {
		parent::__construct();
		$this->import('Isotope');
	}
	
	protected function __clone() {
	}
	
	private static $objInstance;
	
	public static function getInstance() {
		if(!isset(self::$objInstance)) {
			self::$objInstance = new self();
		}
			
		return self::$objInstance;
	}
	
}
