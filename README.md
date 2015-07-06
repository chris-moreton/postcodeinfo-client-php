# postcodeinfo-client-php

PHP API Client wrapper for [MoJ Postcode Info API](https://github.com/ministryofjustice/postcodeinfo)

# Installation

Update your composer.json file to include:

    "require": {
        "ministryofjustice/postcodeinfo-client-php": "1.0.*"
    },
    
Then, run

	composer install
	
# Tests

To run the tests, add a file called spec/api_key. Inside this file place the API token for the postcode info service. Then, from the root of the repository:

	bin/phpspec run --format=pretty -vvv --stop-on-failure
	
	
