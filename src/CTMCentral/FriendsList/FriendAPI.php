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
		$friends = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $username]);

		if($friends[0]["friendlist"] === null) {
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsname), ":username" => $username]);
			return true;
		}else{
			$friendsarray = unserialize($friends[0]["friendlist"]);
			array_push($friendsarray, $friendsname);
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $username]);
			return true;
		}
	}
	public static function removeFriend(String $username, String $friendname) :void {

	}
}