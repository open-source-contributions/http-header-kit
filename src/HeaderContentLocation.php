<?php declare(strict_types=1);

/**
 * It's free open-source software released under the MIT License.
 *
 * @author Anatoly Fenric <anatoly@fenric.ru>
 * @copyright Copyright (c) 2018, Anatoly Fenric
 * @license https://github.com/sunrise-php/http-header-kit/blob/master/LICENSE
 * @link https://github.com/sunrise-php/http-header-kit
 */

namespace Sunrise\Http\Header;

/**
 * Import classes
 */
use Psr\Http\Message\UriInterface;

/**
 * HeaderContentLocation
 *
 * @link https://tools.ietf.org/html/rfc2616#section-14.14
 */
class HeaderContentLocation extends AbstractHeader implements HeaderInterface
{

    /**
     * URI for the header field-value
     *
     * @var UriInterface
     */
    protected $uri;

    /**
     * Constructor of the class
     *
     * @param UriInterface $uri
     */
    public function __construct(UriInterface $uri)
    {
        $this->setUri($uri);
    }

    /**
     * Sets URI for the header field-value
     *
     * @param UriInterface $uri
     *
     * @return self
     */
    public function setUri(UriInterface $uri) : self
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Gets URI for the header field-value
     *
     * @return UriInterface
     */
    public function getUri() : UriInterface
    {
        return $this->uri;
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldName() : string
    {
        return 'Content-Location';
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldValue() : string
    {
        return (string) $this->getUri();
    }
}
