<?php declare(strict_types=1);

namespace Sunrise\Http\Header\Tests;

use PHPUnit\Framework\TestCase;
use Sunrise\Http\Header\HeaderContentLocation;
use Sunrise\Http\Header\HeaderInterface;
use Sunrise\Uri\Uri;

class HeaderContentLocationTest extends TestCase
{
    public function testConstructor()
    {
        $home = new Uri('/');

        $header = new HeaderContentLocation($home);

        $this->assertInstanceOf(HeaderInterface::class, $header);
    }

    public function testSetUri()
    {
        $home = new Uri('/');

        $news = new Uri('/news');

        $header = new HeaderContentLocation($home);

        $this->assertInstanceOf(HeaderInterface::class, $header->setUri($news));

        $this->assertEquals($news, $header->getUri());
    }

    public function testGetUri()
    {
        $home = new Uri('/');

        $header = new HeaderContentLocation($home);

        $this->assertEquals($home, $header->getUri());
    }

    public function testGetFieldName()
    {
        $home = new Uri('/');

        $header = new HeaderContentLocation($home);

        $this->assertEquals('Content-Location', $header->getFieldName());
    }

    public function testGetFieldValue()
    {
        $home = new Uri('/');

        $header = new HeaderContentLocation($home);

        $this->assertEquals('/', $header->getFieldValue());
    }

    public function testToString()
    {
        $home = new Uri('/');

        $header = new HeaderContentLocation($home);

        $this->assertEquals('Content-Location: /', (string) $header);
    }
}
