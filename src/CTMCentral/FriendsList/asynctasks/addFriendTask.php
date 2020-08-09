<?php

namespace CTMCentral\FriendsList\asynctasks;

use CTMCentral\FriendsList\exceptions\NoFriendsException;
use CTMCentral\FriendsList\Loader;
use pocketmine\scheduler\AsyncTask;

class addFriendTask extends AsyncTask {

	/**
	 * @var String
	 */
	private $friendsname;
	/**
	 * @var String
	 */
	private $username;

	public function __construct(String $username, String $friendsname){
		$this->username = $username;
		$this->friendsname = $friendsname;
	}

	public function onRun(): void{
		$player = Loader::getDataBase()->collection("friends")->document($this->username);
		$playersnapshot = $player->snapshot();
		/**
		 * Update friendlist for the user
		 */
		if($playersnapshot["friendlist"] !== null) {
			// ty stackoverflow
			$friendlist = $playersnapshot->get("friendlist");
			if (($key = array_search($this->friendsname, $friendlist)) !== false) {
				unset($friendlist[$key]);
			}
			$player->update([["path" => "friendlist", "value" => $friendlist]]);
		}else{
			throw new NoFriendsException();
		}
		/**
		 * Update friendslist for the friend
		 */

		$friend =  Loader::getDataBase()->collection("friends")->document($this->friendsname);
		$friendlist = $friend->snapshot()->get("friendlist");
		$friendsnapshot = $friend->snapshot();
		if (($key = array_search($this->friendsname, $friendlist)) !== false) {
			unset($friendlist[$key]);
		}
		$friendlist->update([["path" => "friendlist", "value" => $friendlist]]);
		return;
	}
}