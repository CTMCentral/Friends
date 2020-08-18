<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\asynctasks\addFriendTask;
use CTMCentral\FriendsList\asynctasks\removeFriendTask;
use CTMCentral\FriendsList\asynctasks\sendFriendRequestTask;
use CTMCentral\FriendsList\exceptions\FriendNotFoundException;
use CTMCentral\FriendsList\exceptions\FriendRequestDisabledException;
use CTMCentral\FriendsList\exceptions\FriendUsernameSameException;
use CTMCentral\FriendsList\exceptions\NotYourFriendException;
use CTMCentral\FriendsList\exceptions\RequestNotFound;
use pocketmine\Server;

class FriendAPI {

	/**
	 * @var String
	 */
	private $projectid;

	public function __construct(){
		$this->projectid = Database::$projectid;
	}

	/**
	 * @param String $username
	 * @param String $friendsname
	 * @throws FriendNotFoundException throws when Friend's username is not found in db
	 * @throws FriendUsernameSameException throws when friend's username is same as username
	 */
	public function addFriend(String $username, String $friendsname) :void {

		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$db = (new Database())->getDataBase();
		$queryfriendsname = $db->collection("friends")->document($friendsname);
		if (!$queryfriendsname->snapshot()->exists()) {
			throw new FriendNotFoundException();
		}
		Server::getInstance()->getAsyncPool()->submitTask(new addFriendTask($username, $friendsname, $this->projectid));
	}

	/**
	 * @param String $username Username of the player who is removing
	 * @param String $friendsname Username of the friend who is getting removed
	 * @throws FriendNotFoundException thrown when user is not found in database
	 * @throws FriendUsernameSameException thrown when username is the same as the person is ading
	 * @throws NotYourFriendException throws when user is not in his friendlist
	 */
	public function removeFriend(String $username, String $friendsname) :void {
		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}
		$db = (new Database())::getDataBase();
		$friends = $db->collection("friends")->document($friendsname);
		if (!$friends->snapshot()->exists()){
			throw new FriendNotFoundException();
		}

		$queryfriendsname = $db->collection("friends")->document($username)->snapshot()->get("friendlist");
		if (array_search($friendsname, $queryfriendsname) === false) {
			throw new NotYourFriendException();
		}
		Server::getInstance()->getAsyncPool()->submitTask(new removeFriendTask($username, $friendsname, $this->projectid));
	}

	/**
	 * @param String $username Username of the person requesting
	 * @param String $friendsname Username of the friend he/she is requesting
	 * @throws FriendNotFoundException throw when Friend username is not found in db
	 * @throws FriendRequestDisabledException throws when friend request from the user he/she is requesting to is disabled
	 * @throws FriendUsernameSameException
	 */

	public function sendFriendRequest(String $username, String $friendsname) :void {
		$db = (new Database())::getDataBase();

		if ($username === $friendsname) {
			throw new FriendUsernameSameException();
		}

		$queryfriendsname = $db->collection("friends")->document($friendsname);
		if (!$queryfriendsname->snapshot()->exists()) {
			throw new FriendNotFoundException();
		}
		if ($queryfriendsname->snapshot()->get("enabled") === false) {
			throw new FriendRequestDisabledException();
		}
		Server::getInstance()->getAsyncPool()->submitTask(new sendFriendRequestTask($username, $friendsname, $this->projectid));
	}

	/**
	 * Request List of friends
	 * @param String $username the username of the player
	 * @return array returns [] if there is none
	 */
	public function listFriends(String $username) :array {
		$list = Database::querySync("SELECT friendlist FROM friends WHERE username = :username", [":username" => $username]);

		return unserialize($list[0]["friendlist"]);
	}

	/**
	 * @param String $username Username that is accepting
	 * @param String $friendname Username that has requested to add friend
	 */
	public function acceptrequest(String $username, String $friendname) :void {
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
	public function declineRequest(String $username, String $friendsname) :void {
		$requestlist = Database::querySync("SELECT requestlist FROM friends WHERE username = :username", [":username" => $username]);
		$requestarray = unserialize($requestlist[0]["friendlist"]);
		if (!array_search($friendsname, $requestarray)) {
			throw new RequestNotFound();
		}

		if (($key = array_search($username, $requestlist[0]["requestlist"])) !== false) {
			unset($requestarray[$key]);
		}
	}
	public function listRequest(String $username) {
		$list = Database::querySync("SELECT requestlist FROM friends WHERE username = :username", [":username" => $username]);

		return unserialize($list[0]["friendlist"]);
	}
}