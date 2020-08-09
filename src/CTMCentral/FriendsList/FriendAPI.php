<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\asynctasks\addFriendTask;
use CTMCentral\FriendsList\asynctasks\sendFriendRequestTask;
use CTMCentral\FriendsList\exceptions\FriendNotFoundException;
use CTMCentral\FriendsList\exceptions\FriendRequestDisabledException;
use CTMCentral\FriendsList\exceptions\FriendUsernameSameException;
use CTMCentral\FriendsList\exceptions\NoFriendsException;
use CTMCentral\FriendsList\exceptions\NotYourFriendException;
use CTMCentral\FriendsList\exceptions\RequestNotFound;
use pocketmine\Server;

class FriendAPI {

	/**
	 * @param String $username
	 * @param String $friendsname
	 * @throws FriendNotFoundException throws when Friend's username is not found in db
	 * @throws FriendUsernameSameException throws when friend's username is same as username
	 */
	public static function addFriend(String $username, String $friendsname) :void {

		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = Loader::getDataBase()->collection("friends")->document($friendsname);
		if (!$queryfriendsname->snapshot()->exists()) {
			throw new FriendNotFoundException();
		}
		Server::getInstance()->getAsyncPool()->submitTask(new addFriendTask($username, $friendsname));
	}

	/**
	 * @param String $username Username of the player who is removing
	 * @param String $friendsname Username of the friend who is getting removed
	 * @throws FriendNotFoundException thrown when user is not found in database
	 * @throws FriendUsernameSameException thrown when username is the same as the person is ading
	 * @throws NoFriendsException throws when the user has no friends to remove
	 * @throws NotYourFriendException throws when user is not in his friendlist
	 */
	public static function removeFriend(String $username, String $friendsname) :void {
		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = Database::querySync("SELECT username FROM friends WHERE username = :username", [":username" => $friendsname]);
		if (empty($queryfriendsname)) {
			throw new FriendNotFoundException();
		}

		$friends = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $username]);
		if (!array_search($friendsname, $friends[0]["friendlist"])){
			throw new NotYourFriendException();
		}
		if($friends[0]["friendlist"] !== null) {
			$friendsarray = unserialize($friends[0]["friendlist"]);
			// ty stackoverflow
			if (($key = array_search($friendsname, $friendsarray)) !== false) {
				unset($friendsarray[$key]);
			}
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $username]);
		}else {
			throw new NoFriendsException();
		}
		$frienduser = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $friendsname]);
			$friendsarray = unserialize($frienduser[0]["friendlist"]);
			// ty stackoverflow
			if (($key = array_search($username, $friendsarray)) !== false) {
				unset($friendsarray[$key]);
			}
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($friendsarray), ":username" => $friendsname]);
	}

	/**
	 * @param String $username Username of the person requesting
	 * @param String $friendsname Username of the friend he/she is requesting
	 * @throws FriendNotFoundException throw when Friend username is not found in db
	 * @throws FriendRequestDisabledException throws when friend request from the user he/she is requesting to is disabled
	 * @throws FriendUsernameSameException
	 */

	public static function sendFriendRequest(String $username, String $friendsname) :void {
		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = Loader::getDataBase()->document($friendsname);
		if (!$queryfriendsname->snapshot()->exists()) {
			throw new FriendNotFoundException();
		}
		if ($queryfriendsname->snapshot()->get("enabled") === false) {
			throw new FriendRequestDisabledException();
		}
		Server::getInstance()->getAsyncPool()->submitTask(new sendFriendRequestTask($username, $friendsname));
	}

	/**
	 * Request List of friends
	 * @param String $username the username of the player
	 * @return array returns [] if there is none
	 */
	public static function listFriends(String $username) :array {
		$list = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $username]);

		return unserialize($list[0]["friendlist"]);
	}

	/**
	 * @param String $username Username that is accepting
	 * @param String $friendname Username that has requested to add friend
	 */
	public static function acceptrequest(String $username, String $friendname) :void {
		$requestlist = Database::querySync("SELECT requestlist FROM friends WHERE username = :username", [":username" => $username]);
		$requestarray = unserialize($requestlist[0]["friendlist"]);
		if (!array_search($friendname, $requestarray)) {
			throw new RequestNotFound();
		}

		if (($key = array_search($username, $requestlist[0]["requestlist"])) !== false) {
			unset($requestarray[$key]);
			Database::queryAsync("UPDATE friends SET friendlist = :friendlist WHERE username = :username", ["friendlist" => serialize($requestarray), ":username" => $username]);
			self::addFriend($username, $friendname);
		}
	}
	public static function declineRequest(String $username, String $friendsname) :void {
		$requestlist = Database::querySync("SELECT requestlist FROM friends WHERE username = :username", [":username" => $username]);
		$requestarray = unserialize($requestlist[0]["friendlist"]);
		if (!array_search($friendsname, $requestarray)) {
			throw new RequestNotFound();
		}

		if (($key = array_search($username, $requestlist[0]["requestlist"])) !== false) {
			unset($requestarray[$key]);
		}
	}
	public static function listRequest(String $username) {
		$list = Database::querySync("SELECT requestlist FROM friends WHERE username = :username", [":username" => $username]);

		return unserialize($list[0]["friendlist"]);
	}
}