<?php

namespace CTMCentral\FriendsList;

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

	public static function init(String $projectID) {
		self::$projectid = $projectID;
		self::$db = new FirestoreClient(['projectId' => $projectID]);
	}
}