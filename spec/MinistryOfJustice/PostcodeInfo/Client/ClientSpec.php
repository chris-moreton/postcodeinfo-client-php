<?php
namespace spec\MinistryOfJustice\PostcodeInfo\Client;

include "spec/SpecHelper.php";

use PhpSpec\ObjectBehavior;
use MinistryOfJustice\PostcodeInfo\Client\Postcode;

class ClientSpec extends ObjectBehavior
{
    
    function it_is_initializable()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->shouldHaveType('MinistryOfJustice\PostcodeInfo\Client\Client');
    }

    function it_will_get_a_postcode_object_from_a_lookup()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('SW195AL')->shouldBeAValidPostcodeObject();
    }
    
    function it_will_know_if_the_postcode_is_valid()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('SW195AL')->isValid()->shouldBe(true);
    }
    
    function it_will_know_if_the_postcode_is_not_valid()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('MADEUP')->isValid()->shouldBe(false);
    }
    
    function it_will_get_the_postcode_centrepoint_type()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getCentrePoint()->getType()->shouldBe('Point');
    }
    
    function it_will_get_the_postcode_centrepoint_latitude()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getCentrePoint()->getLatitude()->shouldBeCoordinate(57.06892522314932);
    }
    
    function it_will_get_the_postcode_centrepoint_longitude()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getCentrePoint()->getLongitude()->shouldBeCoordinate(-2.148964422536167);
    }
    
    function it_will_get_the_local_authority_gss_code()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('sw1y4jh')->getLocalAuthority()->getGssCode()->shouldBe('E09000033');
    }
    
    function it_will_get_the_local_authority_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('sw1y4 jh')->getLocalAuthority()->getName()->shouldBe('Westminster');
    }
    
    function it_will_get_the_uprn()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('DL3 0UR')->getAddresses()[0]->getUprn()->shouldBe('10013312514');
    }
    
    function it_will_get_the_organisation_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('DL3 0UR')->getAddresses()[0]->getOrganisationName()->shouldBe('ARGOS LTD');
    }
    
    function it_will_get_the_po_box_number()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('M5 0DN')->getAddresses()[0]->getPoBoxNumber()->shouldBe('1234');
    }
    
    function it_will_get_the_building_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('SW19 7nb')->getAddresses()[1]->getBuildingName()->shouldBe('WIMBLEDON REFERENCE LIBRARY');
    }
    
    function it_will_get_the_sub_building_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('BH65AL')->getAddresses()[1]->getSubBuildingName()->shouldBe('FLAT 10');
    }
    
    function it_will_get_the_building_number()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('BH6 5AL')->getAddresses()[5]->getBuildingNumber()->shouldBe(2);
    }

    function it_will_get_the_thoroughfare_name()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('SW195AL')->getAddresses()[0]->getThoroughfareName()->shouldBe('CHURCH ROAD');
    }
    
    function it_will_get_the_dependent_locality()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('hd97ry')->getAddresses()[3]->getDependentLocality()->shouldBe('THONGSBRIDGE');
    }
    
    function it_will_get_the_double_dependent_locality()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB12 4YA')->getAddresses()[0]->getDoubleDependentLocality()->shouldBe('BADENTOY INDUSTRIAL ESTATE');
    }
    
    function it_will_get_the_post_town()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB12 4YA')->getAddresses()[0]->getPostTown()->shouldBe('ABERDEEN');
    }
    
    function it_will_get_the_postcode()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('aB124YA')->getAddresses()[0]->getPostcode()->shouldBe('AB12 4YA');
    }
    
    function it_will_get_the_postcode_type()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getAddresses()[0]->getPostcodeType()->shouldBe('S');
    }

    function it_will_get_the_formatted_address()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getAddresses()[1]->getFormattedAddress()->shouldBe(
            "Downhole Engineering\nBadentoy Road\nBadentoy Industrial Estate\nPortlethen\nAberdeen\nAB12 4YA"
        );
    }
    
    function it_will_get_the_point_type()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getAddresses()[1]->getPoint()->getType()->shouldBe('Point');
    }
    
    function it_will_get_the_latitude()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getAddresses()[0]->getPoint()->getLatitude()->shouldBeCoordinate(57.06970637985032);
    }

    function it_will_get_the_longitude()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo.service.justice.gov.uk/');
        $this->lookupPostcode('AB124YA')->getAddresses()[0]->getPoint()->getLongitude()->shouldBeCoordinate(-2.150890950596414);
    }
    
    public function getMatchers()
    {
        return [
            'beAValidPostcodeObject' => function($subject) {
                return $subject instanceof Postcode;
            },
            'beCoordinate' => function ($subject, $value) {
                // Round to 3 to allow a little flexibility.
                return round($subject, 3) == round($value, 3);
            },
        ];
    }
}
