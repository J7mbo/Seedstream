<?php

use App\Model\Entity\ValueObjects\Server\IpAddress;

/**
 * Class IpAddressTest
 */
class IpAddressTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests that IpAddress only accepts valid addresses
     */
    public function testValidIpAddresses()
    {
        $addresses = [
            '82.157.254.243',
            '255.255.255.255',
            '192.168.1.1',
            '127.0.0.1',
            '8.8.8.8'
        ];

        foreach ($addresses as $ip)
        {
            $this->assertEquals($ip, (string)(new IpAddress($ip)));
        }
    }

    /**
     * Tests that IpAddress throws an exception when given invalid addresses
     */
    public function testInvalidIpAddresses()
    {
        $addresses = [
            '255.255.255.256',
            '256.255.255.255',
            '-1.255.255.255',
            '1.2.3.test',
            'IP ADDRESS',
            '1.2.3.4!',
            '!1.2.3.4'
        ];

        foreach ($addresses as $ip)
        {
            $this->setExpectedException('\InvalidArgumentException');
            new IpAddress($ip);
        }
    }
}