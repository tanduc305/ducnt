<?php
	// ************************************************************************
	// test �e�[�u���p���f��
	// ------------------------------------------------------------------------
	// �y�X�V�����z
	//
	// 2014.06.06 ���ō쐬
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
		// �o�^���t
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => true,
		),
	);

}
