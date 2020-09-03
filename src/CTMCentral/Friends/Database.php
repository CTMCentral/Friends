<?php

namespace CTMCentral\Friends;

use Google\Cloud\Firestore\FirestoreClient;

class Database {

	/**
	 * @var String
	 */
	public static $projectid;

	/**
	 * @var FirestoreClient
	 */
	public static $db;

	/**
	 * @return FirestoreClient
	 */
	public static function getDataBase() {
		return self::$db;
	}

	public static function init(array $json) {
		self::$db = new FirestoreClient($json);
	}
}