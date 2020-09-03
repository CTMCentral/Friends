<?php

namespace CTMCentral\Friends\asynctasks;

use Google\Cloud\Firestore\FirestoreClient;
use pocketmine\scheduler\AsyncTask;

class removeFriendTask extends AsyncTask {

	/**
	 * @var String
	 */
	private $friendsname;
	/**
	 * @var String
	 */
	private $username;
	/**
	 * @var String
	 */
	private $projectid;

	public function __construct(String $username, String $friendsname, String $projectid){
		$this->username = $username;
		$this->friendsname = $friendsname;
		$this->json = $projectid;
	}

	public function onRun(): void{
		$db = new FirestoreClient(['projectId' => $this->json]);
		$player = $db->collection("friends")->document($this->username);
		$playersnapshot = $player->snapshot();
		/**
		 * Update friendlist for the user
		 */
			// ty stackoverflow
			$playerfriends = $playersnapshot->get("friendlist");
			if (($key = array_search($this->friendsname, $playerfriends)) !== false) {
				unset($playerfriends[$key]);
			}
			$player->update([["path" => "friendlist", "value" => $playerfriends]]);
		/**
		 * Update friendslist for the friend
		 */
		$frienddata =  $db->collection("friends")->document($this->friendsname);
		$playerfriends = $frienddata->snapshot()->get("friendlist");
		if (($key = array_search($this->friendsname, $playerfriends)) !== false) {
			unset($playerfriends[$key]);
		}
		$frienddata->update([["path" => "friendlist", "value" => $playerfriends]]);
		return;
	}
}