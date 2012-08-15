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
class Stats implements EntityInterface
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
     * @return float|integer
     */
    public function getDamageIncrease()
    {
        return $this->data['damageIncrease'];
    }

    /**
     * @return float|integer
     */
    public function getDamageReduction()
    {
        return $this->data['damageReduction'];
    }

    /**
     * @return float|integer
     */
    public function getCritChance()
    {
        return $this->data['critChance'];
    }

    /**
     * @return integer
     */
    public function getLife()
    {
        return $this->data['life'];
    }

    /**
     * @return integer
     */
    public function getStrength()
    {
        return $this->data['strength'];
    }

    /**
     * @return integer
     */
    public function getDexterity()
    {
        return $this->data['dexterity'];
    }

    /**
     * @return integer
     */
    public function getIntelligence()
    {
        return $this->data['intelligence'];
    }

    /**
     * @return integer
     */
    public function getVitality()
    {
        return $this->data['vitality'];
    }

    /**
     * @return integer
     */
    public function getArmor()
    {
        return $this->data['armor'];
    }

    /**
     * @return integer
     */
    public function getColdResist()
    {
        return $this->data['coldResist'];
    }

    /**
     * @return integer
     */
    public function getFireResist()
    {
        return $this->data['fireResist'];
    }

    /**
     * @return integer
     */
    public function getLightningResist()
    {
        return $this->data['lightningResist'];
    }

    /**
     * @return integer
     */
    public function getPoisonResist()
    {
        return $this->data['poisonResist'];
    }

    /**
     * @return integer
     */
    public function getArcaneResist()
    {
        return $this->data['arcaneResist'];
    }

    /**
     * @return float|integer
     */
    public function getDamage()
    {
        return $this->data['damage'];
    }
}
