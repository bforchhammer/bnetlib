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
class Progression implements EntityInterface, \Iterator
{
    const DIFFICULTY_NORMAL    = 'normal';
    const DIFFICULTY_HELL      = 'hell';
    const DIFFICULTY_NIGHTMARE = 'nightmare';
    const DIFFICULTY_INFERNO   = 'inferno';

    /**
     * @var array
     */
    protected $difficultyMap = array(
        self::DIFFICULTY_NORMAL    => 1,
        self::DIFFICULTY_HELL      => 2,
        self::DIFFICULTY_NIGHTMARE => 3,
        self::DIFFICULTY_INFERNO   => 4,
    );

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
        foreach ($data as $act) {
            $class   = $this->serviceLocator->get('d3.entity.career.act');
            if (isset($this->headers)) {
                $class->setResponseHeaders($this->headers);
            }
            $class->populate($act);

            $this->data[]               = $act;
            $this->index[$act['act']][] = $act;
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
     * @return Act|null
     */
    public function getByAct($id)
    {
        if (!isset($this->index[$id])) {
            return $this->index[$id];
        }

        return null;
    }

    /**
     * @param  string $difficulty E.g. Progression::DIFFICULTY_NIGHTMARE
     * @return boolean
     */
    public function isClearOnDifficulty($difficulty)
    {
        if (!isset($this->difficultyMap[$difficulty])) {
            return false;
        }

        $diffValue = $this->difficultyMap[$difficulty];

        foreach ($this->data as $act) {
            $current    = $act->getDifficulty();
            $cDiffValue = (isset($this->difficultyMap[$current])) ? $this->difficultyMap[$current] : 0;

            if ($cDiffValue > $diffValue) {
                return false;
            }
        }

        return true;
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