<?php

$GLOBALS['FE_MOD']['miscellaneous']['bbit_iso_order2cart'] = 'ModuleIsotopeOrder2Cart';

$GLOBALS['TL_HOOKS']['replaceInsertTags'][]	= array('IsotopeOrder2Cart', 'hookReplaceInsertTags');
