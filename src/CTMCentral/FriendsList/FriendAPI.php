<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\exceptions\FriendNotFoundException;
use CTMCentral\FriendsList\exceptions\FriendRequestDisabledException;
use CTMCentral\FriendsList\exceptions\FriendUsernameSameException;
use CTMCentral\FriendsList\mysql\Database;

class FriendAPI {
	public static function addFriend(String $username, String $friendsname) :void {

		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = Database::querySync("SELECT username FROM friends WHERE username = :username", [":username" => $friendsname]);
		if (empty($queryfriendsname)) {
			throw new FriendNotFoundException();
		}
		$player = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $username]);
		/**
		 * Update friendlist for the user
		 */
		if($player[0]["friendlist"] === null) {
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsname), ":username" => $username]);
		}else{
			$friendsarray = unserialize($player[0]["friendlist"]);
			array_push($friendsarray, $friendsname);
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $username]);
		}
		/**
		 * Update friendslist for the friend
		 */

		$friends = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $friendsname]);

		if($friends[0]["friendlist"] === null) {
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsname), ":username" => $username]);
			return;
		}else{
			$friendsarray = unserialize($friends[0]["friendlist"]);
			array_push($friendsarray, $friendsname);
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $username]);
			return;
		}

	}
	public static function removeFriend(String $username, String $friendsname) :void {
		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = Database::querySync("SELECT username FROM friends WHERE username = :username", [":username" => $friendsname]);
		if (empty($queryfriendsname)) {
			throw new FriendNotFoundException();
		}
		$friends = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $username]);

		if($friends[0]["friendlist"] !== null) {
			$friendsarray = unserialize($friends[0]["friendlist"]);
			var_dump($friendsarray);
			if (($key = array_search($friendsname, $friendsarray)) !== false) {
				unset($friendsarray[$key]);
			}
			unset($friendsarray[$friendsname]);
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $username]);
			return;
		}
	}
	public static function requestFriend(String $username, String $friendsname) :void {
		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = Database::querySync("SELECT username FROM friends WHERE username = :username", [":username" => $friendsname]);
		if (empty($queryfriendsname)) {
			throw new FriendNotFoundException();
		}

		$isdisabled = Database::querySync("SELECT enabled FROM friends WHERE username = :username", [":username" => $friendsname]);
		if ($isdisabled[0]["enabled"] === 0) {
			throw new FriendRequestDisabledException();
		}

		$requests = Database::querySync("SELECT requestlist FROM friends WHERE username = :username", [":username" => $username]);

		if($requests[0]["requestlist"] === null) {
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsname), ":username" => $username]);
			return;
		}else{
			$friendsarray = unserialize($requests[0]["requestlist"]);
			array_push($friendsarray, $friendsname);
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $username]);
			return;
		}
	}
}