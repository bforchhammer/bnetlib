<?php
/**
 * This file is part of the bnetlib Library.
 * Copyright (c) 2012 Eric Boh <cossish@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code. You can also view the
 * LICENSE file online at https://gitbub.com/coss/bnetlib/LISENCE
 *
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

namespace bnetlib\Resource\Entity\D3\Hero;

use bnetlib\Resource\Entity\EntityInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Followers implements EntityInterface, \IteratorAggregate
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var \stdClass|null
     */
    protected $headers;

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @inheritdoc
     */
    public function populate($data)
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function getResponseHeaders()
    {
        return $this->headers;
    }

    /**
     * @inheritdoc
     */
    public function setResponseHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @inheritdoc
     */
    public function setServiceLocator(ServiceLocatorInterface $locator)
    {
        $this->serviceLocator = $locator;
    }

    /**
     * @return boolean
     */
    public function hasTemplar()
    {
        return isset($this->data['templar']);
    }

    /**
     * @return Follower|null
     */
    public function getTemplar()
    {
        if (isset($this->data['templar'])) {
            return $this->data['templar'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasEnchantress()
    {
        return isset($this->data['enchantress']);
    }

    /**
     * @return Follower|null
     */
    public function getEnchantress()
    {
        if (isset($this->data['enchantress'])) {
            return $this->data['enchantress'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasScoundrel()
    {
        return isset($this->data['scoundrel']);
    }

    /**
     * @return Follower|null
     */
    public function getScoundrel()
    {
        if (isset($this->data['scoundrel'])) {
            return $this->data['scoundrel'];
        }

        return null;
    }

    /**
     * @see    \IteratorAggregate
     * @return Follower
     */
    public function getIterator()
    {
        return $this->data['skills'];
    }
}
