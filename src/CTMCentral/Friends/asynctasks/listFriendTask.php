<?php

namespace CTMCentral\Friends\asynctasks;

use Google\Auth\CredentialsLoader;
use Google\Cloud\Firestore\FirestoreClient;
use pocketmine\scheduler\AsyncTask;

class listFriendTask extends AsyncTask {

	public function onRun(): void{
		$db = (new FirestoreClient(CredentialsLoader::fromWellKnownFile()));
	}
}