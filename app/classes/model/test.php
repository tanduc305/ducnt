<?php
	// ************************************************************************
	// test ƒe[ƒuƒ‹—pƒ‚ƒfƒ‹
	// ------------------------------------------------------------------------
	// yXV—š—ğz
	//
	// 2014.06.06 ‰”Åì¬
	// ************************************************************************
class Model_Test extends \Orm\Model
{
	protected static $_table_name = 'test';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'name',  // name
		'email', // email
	);

	protected static $_observers = array(
		// “o˜^“ú•t
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => true,
		),
	);

}
