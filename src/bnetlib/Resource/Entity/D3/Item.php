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

namespace bnetlib\Resource\Entity\D3;

use bnetlib\Resource\Entity\D3\Shared\Item as BaseItem;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Item extends BaseItem
{
    /**
     * @var array
     */
    protected $services = array(
        'attributesRaw'    => 'd3.entity.item.attributesraw',
        'dps'              => 'd3.entity.item.attributestat',
        'attacksPerSecond' => 'd3.entity.item.attributestat',
        'minDamage'        => 'd3.entity.item.attributestat',
        'maxDamage'        => 'd3.entity.item.attributestat',
        'armor'            => 'd3.entity.item.attributestat',
        'salvage'          => 'd3.entity.item.salvage',
        'attributes'       => 'shared.entity.listdata',
    );

    /**
     * @inheritdoc
     */
    public function populate($data)
    {
        $this->data = $data;

        foreach ($this->services as $key => $service) {
            if (isset($data[$key])) {
                $this->data[$key] = $this->serviceLocator->get($service);
                if (isset($this->headers)) {
                    $this->data[$key]->setResponseHeaders($this->headers);
                }
                $this->data[$key]->populate($data[$key]);
            }
        }
    }

    /**
     * @return integer
     */
    public function getItemLevel()
    {
        return $this->data['itemLevel'];
    }

    /**
     * @return integer
     */
    public function getBonusAffixes()
    {
        return $this->data['bonusAffixes'];
    }

    /**
     * @return boolean
     */
    public function hasSocketEffects()
    {
        return isset($this->data['socketEffects']);
    }

    /**
     * @return array|null
     */
    public function getSocketEffects()
    {
        if (isset($this->data['socketEffects'])) {
            return $this->data['socketEffects'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasAttributes()
    {
        return isset($this->data['attributes']);
    }

    /**
     * @return \bnetlib\Resource\Entity\Shared\ListData|null
     */
    public function getAttributes()
    {
        if (isset($this->data['attributes'])) {
            return $this->data['attributes'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasFlavorText()
    {
        return isset($this->data['flavorText']);
    }

    /**
     * @return Item\AttributesRaw|null
     */
    public function getRawAttributes()
    {
        if (isset($this->data['attributesRaw'])) {
            return $this->data['attributesRaw'];
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function getFlavorText()
    {
        if (isset($this->data['flavorText'])) {
            return $this->data['flavorText'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasDps()
    {
        return isset($this->data['dps']);
    }

    /**
     * @return Item\AttributeStat|null
     */
    public function getDps()
    {
        if (isset($this->data['dps'])) {
            return $this->data['dps'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasAttacksPerSecond()
    {
        return isset($this->data['attacksPerSecond']);
    }

    /**
     * @return Item\AttributeStat|null
     */
    public function getAttacksPerSecond()
    {
        if (isset($this->data['attacksPerSecond'])) {
            return $this->data['attacksPerSecond'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasMinDamage()
    {
        return isset($this->data['minDamage']);
    }

    /**
     * @return Item\AttributeStat|null
     */
    public function getMinDamage()
    {
        if (isset($this->data['minDamage'])) {
            return $this->data['minDamage'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasMaxDamage()
    {
        return isset($this->data['maxDamage']);
    }

    /**
     * @return Item\AttributeStat|null
     */
    public function getMaxDamage()
    {
        if (isset($this->data['maxDamage'])) {
            return $this->data['maxDamage'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasArmor()
    {
        return isset($this->data['armor']);
    }

    /**
     * @return Item\AttributeStat|null
     */
    public function getArmor()
    {
        if (isset($this->data['armor'])) {
            return $this->data['armor'];
        }

        return null;
    }

    /**
     * @return boolean
     */
    public function hasSalvage()
    {
        return isset($this->data['salvage']);
    }

    /**
     * @return Item\Salvage|null
     */
    public function getSalvage()
    {
        if (isset($this->data['salvage'])) {
            return $this->data['salvage'];
        }

        return null;
    }
}