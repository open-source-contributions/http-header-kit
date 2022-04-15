<?php declare(strict_types=1);

namespace Sunrise\Http\Header\Tests;

use PHPUnit\Framework\TestCase;
use Sunrise\Http\Header\HeaderContentSecurityPolicyReportOnly;
use Sunrise\Http\Header\HeaderInterface;

class HeaderContentSecurityPolicyReportOnlyTest extends TestCase
{
    public function testConstructor()
    {
        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $this->assertInstanceOf(HeaderInterface::class, $header);
    }

    public function testConstructorWithInvalidParameterName()
    {
        $this->expectException(\InvalidArgumentException::class);

        new HeaderContentSecurityPolicyReportOnly(['name=' => 'value']);
    }

    public function testConstructorWithInvalidParameterValue()
    {
        $this->expectException(\InvalidArgumentException::class);

        new HeaderContentSecurityPolicyReportOnly(['name' => ';value']);
    }

    public function testSetParameter()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name' => 'value']);

        $this->assertInstanceOf(HeaderInterface::class, $header->setParameter('name', 'overwritten-value'));

        $this->assertSame(['name' => 'overwritten-value'], $header->getParameters());
    }

    public function testSetSeveralParameters()
    {
        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $header->setParameter('name-1', 'value-1');
        $header->setParameter('name-2', 'value-2');

        $this->assertSame([
            'name-1' => 'value-1',
            'name-2' => 'value-2',
        ], $header->getParameters());
    }

    public function testSetParameterWithInvalidName()
    {
        $this->expectException(\InvalidArgumentException::class);

        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $header->setParameter('name=', 'value');
    }

    public function testSetParameterWithInvalidValue()
    {
        $this->expectException(\InvalidArgumentException::class);

        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $header->setParameter('name', ';value');
    }

    public function testSetParameters()
    {
        $header = new HeaderContentSecurityPolicyReportOnly([
            'name-1' => 'value-1',
            'name-2' => 'value-2',
        ]);

        $this->assertInstanceOf(HeaderInterface::class, $header->setParameters([
            'name-1' => 'overwritten-value-1',
            'name-2' => 'overwritten-value-2',
        ]));

        $this->assertSame([
            'name-1' => 'overwritten-value-1',
            'name-2' => 'overwritten-value-2',
        ], $header->getParameters());
    }

    public function testSetParametersWithParameterThatContainsInvalidName()
    {
        $this->expectException(\InvalidArgumentException::class);

        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $header->setParameters(['name=' => 'value']);
    }

    public function testSetParametersWithParameterThatContainsInvalidValue()
    {
        $this->expectException(\InvalidArgumentException::class);

        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $header->setParameters(['name' => ';value']);
    }

    public function testGetParameters()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name' => 'value']);

        $this->assertSame(['name' => 'value'], $header->getParameters());
    }

    public function testClearParameters()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name-1' => 'value-1']);

        $header->setParameter('name-2', 'value-2');
        $header->setParameter('name-3', 'value-3');

        $this->assertInstanceOf(HeaderInterface::class, $header->clearParameters());

        $this->assertSame([], $header->getParameters());
    }

    public function testGetFieldName()
    {
        $header = new HeaderContentSecurityPolicyReportOnly([]);

        $this->assertSame('Content-Security-Policy-Report-Only', $header->getFieldName());
    }

    public function testGetFieldValueWithoutParameterValue()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name' => '']);

        $this->assertSame('name', $header->getFieldValue());
    }

    public function testGetFieldValueWithParameterValue()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name' => 'value']);

        $this->assertSame('name value', $header->getFieldValue());
    }

    public function testToStringWithoutParameterValue()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name' => '']);

        $this->assertSame('Content-Security-Policy-Report-Only: name', (string) $header);
    }

    public function testToStringWithParameterValue()
    {
        $header = new HeaderContentSecurityPolicyReportOnly(['name' => 'value']);

        $this->assertSame('Content-Security-Policy-Report-Only: name value', (string) $header);
    }

    public function testToStringWithSeveralParameters()
    {
        $header = new HeaderContentSecurityPolicyReportOnly([
            'name-1' => '',
            'name-2' => 'value-2',
            'name-3' => 'value-3',
        ]);

        $expected = 'Content-Security-Policy-Report-Only: name-1; name-2 value-2; name-3 value-3';

        $this->assertSame($expected, (string) $header);
    }
}
