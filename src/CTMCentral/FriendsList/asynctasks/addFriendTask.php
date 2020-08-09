<?php

namespace CTMCentral\FriendsList\asynctasks;

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
		/*
		 * Can't be bothered tp use ctrl r
		 */
		$friendsname = $this->friendsname;
		$username = $this->username;
		$player = Loader::$db->collection("friends")->document($username);
		$playersnapshot = $player->snapshot();
		/**
		 * Update friendlist for the user
		 */
		if($playersnapshot["friendlist"] === null) {
			$player->update([["path" => "friendlist", "value" => [$friendsname]]]);
		}else{
			$playerfriends = $playersnapshot->get("friendlist");
			array_push($playerfriends, $friendsname);
			$player->update([["path" => "friendlist", "value" => $playerfriends]]);
		}
		/**
		 * Update friendslist for the friend
		 */

		$frienddata =  Loader::$db->collection("friends")->document($friendsname);

		$friendsnapshot = $frienddata->snapshot();

		if($friendsnapshot->data()["friendlist"] === null) {
			$frienddata->update([["path" => "friendlist", "value" => [$username]]]);
			return;
		}else{
			$frinedlist = $friendsnapshot->get("friendlist");
			array_push($frinedlist, $username);
			$frienddata->update([["path" => "friendlist", "value" => $frinedlist]]);
			return;
		}
	}
}