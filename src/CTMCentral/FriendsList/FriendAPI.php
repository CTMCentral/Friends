<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\exceptions\FriendOfflineException;
use pocketmine\Server;

class FriendAPI {
	public static function addFriend(String $username, String $friendsname) :bool {
		$server = Server::getInstance();

		if ($server->getPlayer($username) === null) {
			throw new FriendOfflineException();
		}

	}
}