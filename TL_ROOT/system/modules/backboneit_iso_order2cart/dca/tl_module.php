<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['bbit_iso_order2cart']
	= '{title_legend},name,type'
	. ';{config_legend},bbit_iso_o2c_emptyCart,bbit_iso_o2c_processOnly,jumpTo'
	. ';{protected_legend:hide},protected'
	. ';{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['bbit_iso_o2c_emptyCart'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['bbit_iso_o2c_emptyCart'],
	'exclude'	=> true,
	'inputType'	=> 'checkbox',
	'eval'		=> array(
		'tl_class' => 'clr w50 cbx',
	),
);

$GLOBALS['TL_DCA']['tl_module']['fields']['bbit_iso_o2c_processOnly'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['bbit_iso_o2c_processOnly'],
	'exclude'	=> true,
	'inputType'	=> 'checkbox',
	'eval'		=> array(
		'tl_class' => 'w50 cbx',
	),
);
