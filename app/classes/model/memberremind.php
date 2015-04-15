<?php
	// ************************************************************************
	// model for member_remind table
	// ------------------------------------------------------------------------
	// [update history]
	//
	// 2014.06.20 create
	// ************************************************************************
class Model_MemberRemind extends \Orm\Model
{
	protected static $_table_name = 'member_remind';
	protected static $_primary_key = array('remind_id');

	protected static $_properties = array(
		'remind_id',      // 再発行ID
		'member_id',      // 会員ID
		'mail_hash',      // メールハッシュ
		'is_active',      // 有効フラグ
		'created_at',     // 作成日時
		'modified_at',    // 更新日時
		'registed_at',    // 再発行日時
	);

	protected static $_observers = array(
		// create date
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => true,
		),
		// update date
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'modified_at',
			'mysql_timestamp' => true,
		),
	);

}
