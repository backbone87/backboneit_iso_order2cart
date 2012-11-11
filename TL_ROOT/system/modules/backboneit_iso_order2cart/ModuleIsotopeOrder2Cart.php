<?php

class ModuleIsotopeOrder2Cart extends ModuleIsotope {
	
	protected $strTemplate = 'mod_bbit_iso_order2cart';
	
	protected $strO2C;
	
	public function generate() {
		if(TL_MODE == 'BE') {
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ISOTOPE ECOMMERCE: ORDER 2 CART ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$this->processSubmit();
		
		if($this->bbit_iso_o2c_processOnly) {
			return '';
		}
		
		return parent::generate();
	}
	
	protected function compile() {
	}
	
	protected function processSubmit() {
		if($this->Input->post('FORM_SUBMIT') != IsotopeOrder2Cart::SUBMIT_TOKEN) {
			return;
		}
		
		$objOrder = new IsotopeOrder();
		$strUID = $this->Input->post('order');
		if(strlen($strUID) && $objOrder->findBy('uniqid', $strUID)) {
			if($this->bbit_iso_o2c_emptyCart) foreach($this->Isotope->Cart->getProducts() as $objProduct) {
				$this->Isotope->Cart->deleteProduct($objProduct);
			}
			$this->Isotope->Cart->transferFromCollection($objOrder);
		}
		
		$this->jumpToOrReload($this->jumpTo);
	}

}
