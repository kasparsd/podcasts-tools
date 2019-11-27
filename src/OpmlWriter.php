<?php

namespace Kasparsd\ApplePodcastsTools;

use SimpleXMLElement;

class OpmlWriter {

	protected $items;

	public function addItem( $attributes ) {
		$this->items[] = $attributes;
	}

	public function render() {
		$xml = new SimpleXMLElement( '<opml/>' );
		$xml->addAttribute( 'version', '2.0' );

		$body = $xml->addChild( 'body' );

		foreach ( $this->items as $item ) {
			$outline = $body->addChild( 'outline' );

			foreach ( $item as $attribute_name => $attribuve_value ) {
				$outline->addAttribute( $attribute_name, $attribuve_value );
			}
		}

		return $xml->asXML();
	}

}
