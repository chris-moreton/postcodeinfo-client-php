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

    function it_will_perform_a_postcode_lookup()
    {
        $this->beConstructedWith(file_get_contents('spec/api_key'), 'https://postcodeinfo-staging.dsd.io/');
        $this->lookupPostcode('SW195AL')->shouldBeAValidPostcodeObject();
        $this->lookupPostcode('SW195AL')->getAddresses()[0]->getThoroughfareName()->shouldBe('CHURCH ROAD');
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
