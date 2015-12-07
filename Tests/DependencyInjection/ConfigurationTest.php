<?php

namespace Tests\Indigo\Bundle\CookieConsentBundle\DependencyInjection;

use Indigo\Bundle\CookieConsentBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    protected function getConfiguration()
    {
        return new Configuration();
    }

    /**
     * @test
     */
    public function it_accepts_null_as_a_valid_configuration()
    {
        $this->assertConfigurationIsInvalid([[null]]);
    }
}
