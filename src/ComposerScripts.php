<?php

namespace Kasparsd\ApplePodcastsTools;

use Composer\Script\Event;

class ComposerScripts {

	const PODCAST_PLIST_PATH = 'Library/Containers/com.apple.podcasts/Data/Documents/PodcastsDB.plist';

	public static function toOpml( Event $event ) {
		$tools = new Tools( self::defaultPlist() );

		echo $tools->toOpml();
	}

	public static function defaultPlist() {
		return sprintf(
			'%s/%s',
			getenv( 'HOME' ),
			self::PODCAST_PLIST_PATH
		);
	}

}
