<?php

namespace CTMCentral\FriendsList;

use Google\Cloud\Firestore\FirestoreClient;

class Database {
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

	public static function init(String $projectID) {
		self::$db = new FirestoreClient(['projectId' => $projectID]);
	}
}