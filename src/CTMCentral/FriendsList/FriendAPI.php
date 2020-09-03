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
use CTMCentral\FriendsList\exceptions\UserNotFound;
use Google\Auth\CredentialsLoader;
use pocketmine\Server;

class FriendAPI {

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
		Server::getInstance()->getAsyncPool()->submitTask(new addFriendTask($username, $friendsname, CredentialsLoader::fromWellKnownFile()));
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
		Server::getInstance()->getAsyncPool()->submitTask(new removeFriendTask($username, $friendsname, CredentialsLoader::fromWellKnownFile()));
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
		Server::getInstance()->getAsyncPool()->submitTask(new sendFriendRequestTask($username, $friendsname, CredentialsLoader::fromWellKnownFile()));
	}

	/**
	 * Request List of friends
	 * @param String $username the username of the player
	 * @return array returns [] if there is none
	 */
	public function listFriends(String $username) :array {
		$db = (new Database())::getDataBase();
		$queryfriendsname = $db->collection("friends")->document($username);
		if (!$queryfriendsname->snapshot()->exists()) {
			throw new UserNotFound();
		}
		return $db->collection("friends")->document($username)->snapshot()->get("friendlist");
	}

	/**
	 * @param String $username Username that is accepting
	 * @param String $friendname Username that has requested to add friend
	 */
	public function acceptrequest(String $username, String $friendname) :void {
		if ($username === $friendname) {
			throw new FriendUsernameSameException();
		}
		$db = (new Database)->getDatabase();
		$queryfriendsname = $db->collection("friends")->document($friendname);
		if (!$queryfriendsname->snapshot()->exists()) {
			throw new FriendNotFoundException();
		}
		$requestsentlist = $db->collection("friends")->document($username)->snapshot();
		if (!array_search($friendname, $requestsentlist->get("requestsentlist"))) {
			throw new RequestNotFound();
		}

		if (($key = array_search($username, $requestsentlist[0]["requestsentlist"])) !== false) {
			unset($requestsentlist[$key]);
			$db->collection("friends")->document($username)->update([["path" => "requestsentlist", "value" => $requestsentlist]]);
		}

		$requestlist = $db->collection("friends")->document($friendname)->snapshot();
		if (($key = array_search($friendname, $requestlist[0]["requestlist"])) !== false) {
			unset($requestlist[$key]);
			$db->collection("friends")->document($username)->update([["path" => "requestlist", "value" => $requestlist]]);
		}
		Server::getInstance()->getAsyncPool()->submitTask(new addFriendTask($username, $friendname, CredentialsLoader::fromWellKnownFile()));
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
	public function listRequest(String $username, int $limit = null, ?callable $resuult){
		if ($resuult !== null) {

		}
	}
}