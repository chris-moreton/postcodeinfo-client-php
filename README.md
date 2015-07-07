# postcodeinfo-client-php

PHP API Client wrapper for [MoJ Postcode Info API](https://github.com/ministryofjustice/postcodeinfo)

# Installation

Update your composer.json file to include:

    "require": {
        "ministryofjustice/postcodeinfo-client-php": "*"
    },
    
Then, run

	composer install
	
# Usage

	You will need your API key for the PostcodeInfo service.

	use ministryofjustice\postcodeinfo\client\Client;
	
	$apiKey = 'API_KEY_HERE';
	$endpoint = 'https://postcodeinfo-staging.dsd.io/';
	
	$client = new Client(
		$apiKey,
		$endpoint
	);
	
	$postcode = $client->lookupPostcode('AB124YA');
	
	$isValid = $postcode->isValid();
	
	$centrePoint = $postcode->getCentrePoint();
	$centrePoint->getLatitude();
	$centrePoint->getLongitude();
	
	$localAuth = $postcode->getLocalAuthority();
	$localAuth->getName();
	$localAuth->getGssCode();
	
	$addresses = $postcode->getAddresses();
	
	foreach ($addresses as $address) {
		$address->getUprn();
        $address->getThoroughfareName();
        $address->getOrganisationName();
        $address->getDepartmentName();
        $address->getPoBoxNumber();
        $address->getBuildingName();
        $address->getSubBuildingName();
        $address->getBuildingNumber();
        $address->getDependentLocality();
        $address->getDoubleDependentLocality();
        $address->getPostTown();
        $address->getPostcode();
        $address->getPostcodeType();
        $address->getFormattedAddress();
        
        $point = $address->getPoint();
        $point->getLatitude();
        $point->getLongitude();
 	}

Please see the tests in spec/ministryofjustice/postcodeinfo/client/ClientSpec.php to see all the interface methods and their usage.

For example,

	function it_will_get_the_postcode_centrepoint_longitude()
	{
	    $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
	    $this->lookupPostcode('AB124YA')->getCentrePoint()->getLongitude()->shouldBe(57.06892522314932);
	}
	
# Tests

To run the tests, add a file called spec/api_key. Inside this file place the API token for the postcode info service. Then, from the root of the repository:

	bin/phpspec run --format=pretty -vvv --stop-on-failure
	
	
