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
    
    function it_will_get_the_po_box_number()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('M5 0DN')->getAddresses()[0]->getPoBoxNumber()->shouldBe('1234');
    }
    
    function it_will_get_the_building_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('SW19 7nb')->getAddresses()[1]->getBuildingName()->shouldBe('WIMBLEDON REFERENCE LIBRARY');
    }
    
    function it_will_get_the_sub_building_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('BH65AL')->getAddresses()[1]->getSubBuildingName()->shouldBe('FLAT 10');
    }
    
    function it_will_get_the_building_number()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('BH6 5AL')->getAddresses()[5]->getBuildingNumber()->shouldBe(2);
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
