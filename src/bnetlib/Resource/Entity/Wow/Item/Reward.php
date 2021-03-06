<?php
/**
 * This file is part of the bnetlib Library.
 * Copyright (c) 2012 Eric Boh <cossish@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code. You can also view the
 * LICENSE file online at http://coss.github.com/bnetlib/license.html
 *
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

namespace bnetlib\Resource\Entity\Wow\Item;

use bnetlib\Resource\Entity\ConsumeInterface;
use bnetlib\Resource\Entity\Wow\Shared\Item as BaseItem;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Reward extends BaseItem implements ConsumeInterface
{
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
    public function consume()
    {
        return array('itemid' => $this->data['id']);
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->data['icon'];
    }

    /**
     * @return boolean
     */
    public function hasTooltipParams()
    {
        return !empty($this->data['tooltipParams']);
    }

    /**
     * @return array
     */
    public function getTooltipParams()
    {
        return $this->data['tooltipParams'];
    }
}