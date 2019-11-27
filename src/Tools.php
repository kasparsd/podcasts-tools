<?php

namespace Kasparsd\ApplePodcastsTools;

class Tools {

	protected $db_file;

	public function __construct( $db_file ) {
		$this->db_file = $db_file;
	}

	public function podcastIdToUrl( $id ) {
		return sprintf(
			'https://podcasts.apple.com/us/podcast/id%d',
			$id
		);
	}

	public function toOpml() {
		$parser = new Parser( $this->db_file );
		$opml = new OpmlWriter();

		foreach ( $parser->subscriptions() as $feed ) {
			$item = [
				'type' => 'rss',
				'title' => $feed['title'],
				'feedUrl' => $feed['feedUrl'],
			];

			if ( ! empty( $feed['storeId'] ) ) {
				$item['htmlUrl'] = $this->podcastIdToUrl( $feed['storeId'] );
			}

			$opml->addItem( $item );
		}

		return $opml->render();
	}

}
