<?php

namespace Kasparsd\ApplePodcastsTools;

use Composer\Script\Event;

class ComposerScripts {

	const PODCAST_PLIST_PATH = 'Library/Containers/com.apple.podcasts/Data/Documents/PodcastsDB.plist';

	public static function toOpml( Event $event ) {
		$parser = new Parser( self::defaultPlist() );
		$opml = new OpmlWriter();

		foreach ( $parser->subscriptions() as $feed ) {
			$item = [
				'type' => 'rss',
				'title' => $feed['title'],
				'feedUrl' => $feed['feedUrl'],
			];

			if ( ! empty( $feed['storeId'] ) ) {
				$item['url'] = self::podcastIdToUrl( $feed['storeId'] );
			}

			$opml->addItem( $item );
		}

		echo $opml->render();
	}

	public static function podcastIdToUrl( $id ) {
		return sprintf(
			'https://podcasts.apple.com/us/podcast/id%d',
			$id
		);
	}

	public static function defaultPlist() {
		return sprintf(
			'%s/%s',
			getenv( 'HOME' ),
			self::PODCAST_PLIST_PATH
		);
	}

}
