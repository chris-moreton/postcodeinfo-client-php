<?php
namespace spec\ministryofjustice\postcodeinfo\client;

include "spec/SpecHelper.php";

use PhpSpec\ObjectBehavior;
use ministryofjustice\postcodeinfo\client\Postcode;

class ClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->shouldHaveType('ministryofjustice\postcodeinfo\client\Client');
    }

    function it_will_get_a_postcode_object_from_a_lookup()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('SW195AL')->shouldBeAValidPostcodeObject();
    }
    
    function it_will_get_the_uprn()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('DL3 0UR')->getAddresses()[0]->getUprn()->shouldBe('10013312514');
    }
    
    function it_will_get_the_thoroughfare_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('SW195AL')->getAddresses()[0]->getThoroughfareName()->shouldBe('CHURCH ROAD');
    }
    
    function it_will_get_the_organisation_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('DL3 0UR')->getAddresses()[0]->getOrganisationName()->shouldBe('ARGOS LTD');
    }
    
    public function getMatchers()
    {
        return [
            'beAValidPostcodeObject' => function($subject) {
                return $subject instanceof Postcode;
            },
        ];
    }
}
