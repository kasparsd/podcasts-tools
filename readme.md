# Tools for Apple Podcasts

Export the podcast subscriptions in the OPML format from the Podcasts app introduced in macOS Catalina.

It works by parsing the plist file at:

	~/Library/Containers/com.apple.podcasts/Data/Documents/PodcastsDB.plist


## Requirements

- PHP 5.6 or later
- [Composer](https://getcomposer.org)


## Install

	composer create-project kasparsd/podcasts-tools
	

## Usage

To export podcast subscriptions as OPML, run:

	composer export > opml.xml

which pipes the output of the `composer export` command to the `opml.xml` file.


## Credits

Created by [Kaspars Dambis](https://kaspars.net).
