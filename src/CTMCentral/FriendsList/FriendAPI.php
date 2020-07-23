<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\exceptions\FriendOfflineException;
use CTMCentral\FriendsList\exceptions\FriendUsernameSameException;
use CTMCentral\FriendsList\mysql\Database;
use pocketmine\Server;

class FriendAPI {
	public static function addFriend(String $username, String $friendsname) :bool {
		$server = Server::getInstance();

		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		if ($server->getPlayer($friendsname) === null) {
			throw new FriendOfflineException();
		}
		$friends = Database::querySync("SELECT friendslist FROM friends WHERE usernmae = ")
	}
}