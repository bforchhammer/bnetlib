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
class Act implements EntityInterface, \IteratorAggregate
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

        if (!empty($data['completedQuests'])) {
            $this->data['completedQuests'] = array();

            foreach ($data['completedQuests'] as $quest) {
                $this->data['completedQuests'][$quest['slug']] = $quest['name'];
            }
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
     * @return boolean
     */
    public function hasCompleted()
    {
        return $this->data['completed'];
    }

    /**
     * @return boolean
     */
    public function hasCompletedQuests()
    {
        return !empty($this->data['completedQuests']);
    }

    /**
     * You can also iterate directly over an Act object.
     *
     * The key will be the quest slug and the value will be the quest name.
     *
     * @return array
     */
    public function getCompletedQuests()
    {
        return $this->data['completedQuests'];
    }

    /**
     * @return array
     */
    public function getCompletedQuestSlugs()
    {
        return array_keys($this->data['completedQuests']);
    }

    /**
     * @return array
     */
    public function getCompletedQuestNames()
    {
        return array_values($this->data['completedQuests']);
    }

    /**
     * Key (slug value) => Value (name value)
     *
     * @see    \IteratorAggregate
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data['completedQuests']);
    }
}