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
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

namespace bnetlib\Resource\Wow;

use bnetlib\Resource\ResourceInterface;
use bnetlib\Resource\Wow\Achievements\Criteria;
use bnetlib\Resource\Wow\Achievements\DataAchievement;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Achievement extends DataAchievement implements \Iterator
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @inheritdoc
     */
    public function populate($data)
    {
        if (empty($data['rewardItems'])) {
            unset($data['rewardItems']);
        }

        parent::populate($data);

        unset($this->data['criteria']);

        foreach ($data['criteria'] as $i => $criteria) {
            $this->data['criteria'][$i] = new Criteria();
            if (isset($this->headers)) {
                $this->data['criteria'][$i]->setResponseHeaders($this->headers);
            }
            $this->data['criteria'][$i]->populate($criteria);
        }
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->data['icon'];
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        return $this->data['criteria'];
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
     * @return bnetlib\Resource\Wow\Achievements\Criteria
     */
    public function current()
    {
        return $this->data['criteria'][$this->position];
    }

    /**
     * @see    \Iterator
     * @return int
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
        return isset($this->data['criteria'][$this->position]);
    }
}