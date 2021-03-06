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

namespace bnetlib\Resource\Entity\D3\Follower;

use bnetlib\Resource\Entity\EntityInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Items implements EntityInterface, \Iterator
{
    /**
     * @var integer
     */
    protected $position = 0;

    /**
     * @var array
     */
    protected $index = array();

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var array|null
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
        foreach ($data as $slot => $value) {
            if ($value === null) {
                continue;
            }

            $this->index[]     = $slot;
            $this->data[$slot] = $this->serviceLocator->get('d3.entity.shared.item');
            if (isset($this->headers)) {
                $this->data[$slot]->setResponseHeaders($this->headers);
            }
            $this->data[$slot]->populate($value);
        }
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
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * @return boolean
     */
    public function hasShoulders()
    {
        return isset($this->data['shoulders']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getShoulders()
    {
        if (isset($this->data['shoulders'])) {
            return $this->data['shoulders'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasMainHand()
    {
        return isset($this->data['mainHand']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getMainHand()
    {
        if (isset($this->data['mainHand'])) {
            return $this->data['mainHand'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasOffHand()
    {
        return isset($this->data['offHand']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getOffHand()
    {
        if (isset($this->data['offHand'])) {
            return $this->data['offHand'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasRightFinger()
    {
        return isset($this->data['rightFinger']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getRightFinger()
    {
        if (isset($this->data['rightFinger'])) {
            return $this->data['rightFinger'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasLeftFinger()
    {
        return isset($this->data['leftFinger']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getLeftFinger()
    {
        if (isset($this->data['leftFinger'])) {
            return $this->data['leftFinger'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasNeck()
    {
        return isset($this->data['neck']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getNeck()
    {
        if (isset($this->data['neck'])) {
            return $this->data['neck'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasSpecial()
    {
        return isset($this->data['special']);
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Shared\Item|null
     */
    public function getSpecial()
    {
        if (isset($this->data['special'])) {
            return $this->data['special'];
        }

        return null;
    }

    /**
     * @see \Iterator
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @see    \Iterator
     * @return Item
     */
    public function current()
    {
        return $this->data[$this->index[$this->position]];
    }

    /**
     * @see    \Iterator
     * @return string Item slot name
     */
    public function key()
    {
        return $this->index[$this->position];
    }

    /**
     * @see \Iterator
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @see    \Iterator
     * @return boolean
     */
    public function valid()
    {
        return isset($this->index[$this->position]);
    }
}