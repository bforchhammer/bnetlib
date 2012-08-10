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

namespace bnetlib\Resource\Entity\D3\Career;

use bnetlib\Resource\Entity\EntityInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Heroes implements EntityInterface, \Iterator, \Countable
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
        foreach ($data as $hero) {
            if (isset($hero['death'])) {
                $idKey   = 'heroId';
                $service = 'd3.entity.fallenhero.hero';
            } else {
                $idKey   = 'id';
                $service = 'd3.entity.shared.hero';
            }

            $class   = $this->serviceLocator->get($service);
            if (isset($this->headers)) {
                $class->setResponseHeaders($this->headers);
            }
            $class->populate($hero);

            $this->data[]                         = $class;
            $this->index['id'][$hero[$idKey]][]   = $class;
            $this->index['name'][$hero['name']][] = $class;
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
     * @param  integer $id
     * @return \bnetlib\Resource\Entity\D3\Shared\Hero|FallenHero|null
     */
    public function getById($id)
    {
        if (!isset($this->index['id'][$id])) {
            return $this->index['id'][$id];
        }

        return null;
    }

    /**
     * @param  string $name
     * @return \bnetlib\Resource\Entity\D3\Shared\Hero|FallenHero|null
     */
    public function getByName($name)
    {
        if (!isset($this->index['name'][$name])) {
            return $this->index['name'][$name];
        }

        return null;
    }

    /**
     * @see    \Countable
     * @return integer
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
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
     * @return mixed
     */
    public function current()
    {
        return $this->data[$this->position];
    }

    /**
     * @see    \Iterator
     * @return integer
     */
    public function key()
    {
        return $this->position;
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
        return isset($this->data[$this->position]);
    }
}