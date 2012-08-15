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

namespace bnetlib\Resource\Entity\D3\Shared;

use bnetlib\Resource\Entity\EntityInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Progress implements EntityInterface, \IteratorAggregate
{
    /**#@+
     * @var string
     */
    const DIFFICULTY_NORMAL    = 'normal';
    const DIFFICULTY_HELL      = 'hell';
    const DIFFICULTY_NIGHTMARE = 'nightmare';
    const DIFFICULTY_INFERNO   = 'inferno';
    /**#@-*/

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
        foreach ($data as $difficulty => $acts) {
            $class = $this->serviceLocator->get('d3.entity.shared.difficulty');
            if (isset($this->headers)) {
                $class->setResponseHeaders($this->headers);
            }
            $class->populate($acts);

            $this->data[$difficulty] = $class;
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
     * @param  string $difficulty E.g. Progression::DIFFICULTY_NIGHTMARE
     * @return Difficulty|null
     */
    public function getByDifficulty($difficulty)
    {
        if (isset($this->data[$difficulty])) {
            return $this->data[$difficulty];
        }

        return null;
    }

    /**
     * Works as a proxy and calls hasCompleted for a specific difficulty.
     *
     * @param  string $difficulty E.g. Progression::DIFFICULTY_NIGHTMARE
     * @return boolean
     */
    public function hasCompletedOnDifficulty($difficulty)
    {
        if (!isset($this->data[$difficulty])) {
            return false;
        }

        return $this->data[$difficulty]->hasCompleted();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * @see    \IteratorAggregate
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }
}