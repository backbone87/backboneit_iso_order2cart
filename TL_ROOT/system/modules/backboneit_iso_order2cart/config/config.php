<?php

$GLOBALS['FE_MOD']['miscellaneous']['bbit_iso_order2cart'] = 'ModuleIsotopeOrder2Cart';

/*
 * {{cache_bbit_iso_order2cart::LABEL::ORDER::JUMPTO}}
 * 
 * LABEL - optional - The label of the button, if empty translation file is used
 * ORDER - optional - The uniqid of the order to be added to cart, if empty
 * 		the uid HTTP GET param is used, if none is available the order2cart
 * 		button is not rendered
 * JUMPTO - optional - The action page of the form, where the Order2Cart module
 * 		is located, if empty the current page will be used as target
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][]	= array('IsotopeOrder2Cart', 'hookReplaceInsertTags');
