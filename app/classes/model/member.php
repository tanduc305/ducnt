<?php
	// ************************************************************************
	// model for member table
	// ------------------------------------------------------------------------
	// [update history]
	//
	// 2014.06.20 create
	// ************************************************************************
class Model_Member extends \Orm\Model
{
	protected static $_table_name = 'member';
	protected static $_primary_key = array('member_id');

	protected static $_properties = array(
		'member_id',      // 会員ID
		'alias',          // 表示名
		'name',           // 会員名
		'name_kana',      // 会場名読み
		'email',          // メールアドレス
		'email_sub',      // 予備のメールアドレス
		'password',       // パスワードハッシュ
		'password_temp',  // 仮パスワードハッシュ
		'login_at',       // 最終ログイン日時
		'password_at',    // 最終パスワード変更日時
		'birthday',       // 誕生日
		'addr_zip',       // 住所 郵便番号
		'addr_pref',      // 住所 都道府県
		'addr_city',      // 住所 市区町村
		'addr_street',    // 住所 以降の住所
		'phone_landline', // 電話番号 固定電話
		'phone_mobile',   // 電話番号 携帯電話
		'member_status',  // 会員ステータス
		'score_plus',     // スコア 良い
		'score_minus',    // スコア 悪い
		'cert_id_1',      // 本人確認書類ID 1
		'cert_id_2',      // 本人確認書類ID 2
		'note',           // メモ
		'is_active',      // 有効フラグ
		'created_at',     // 作成日時
		'modified_at',    // 更新日時
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
