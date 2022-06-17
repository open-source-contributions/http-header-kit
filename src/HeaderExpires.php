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
use DateTimeInterface;

/**
 * @link https://tools.ietf.org/html/rfc2616#section-14.21
 * @link https://tools.ietf.org/html/rfc822#section-5
 */
class HeaderExpires extends AbstractHeader
{

    /**
     * @var DateTimeInterface
     */
    protected $timestamp;

    /**
     * Constructor of the class
     *
     * @param DateTimeInterface $timestamp
     */
    public function __construct(DateTimeInterface $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldName() : string
    {
        return 'Expires';
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldValue() : string
    {
        return $this->formatDateTime($this->timestamp);
    }
}
