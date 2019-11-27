<?php

namespace Kasparsd\ApplePodcastsTools;

class Parser {

	protected $file;

	public function __construct( $file ) {
		$this->file = $file;
	}

	protected function parsed() {
		return simplexml_load_file( $this->file );
	}

	public function subscriptions() {
		$xml = $this->parsed();
		$feeds = [];

		foreach ( $xml->array->dict->array->dict->array->children() as $feed ) {
			$feeds[] = array_combine( (array) $feed->key, (array) $feed->string );
		}

		return $feeds;
	}

}
