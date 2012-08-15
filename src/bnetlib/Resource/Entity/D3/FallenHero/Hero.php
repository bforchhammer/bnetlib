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

namespace bnetlib\Resource\Entity\D3\FallenHero;

use bnetlib\Resource\Entity\D3\Shared\Hero as BaseHero;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Hero extends BaseHero
{
    /**
     * @inheritdoc
     */
    protected $services = array(
        'items' => 'd3.entity.hero.items',
        'stats' => 'd3.entity.hero.stats',
        'kills' => 'd3.entity.shared.kills',
        'death' => 'd3.entity.fallenhero.death',
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
    public function getId()
    {
        return $this->data['heroId'];
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Hero\Items
     */
    public function getItems()
    {
        return $this->data['items'];
    }

    /**
     * @return \bnetlib\Resource\Entity\D3\Hero\Stats
     */
    public function getStats()
    {
        return $this->data['stats'];
    }

    /**
     * @return Kills
     */
    public function getKills()
    {
        return $this->data['kills'];
    }

    /**
     * @return Death
     */
    public function getDeath()
    {
        return $this->data['death'];
    }

    /**
     * @inheritdoc
     */
    public function consume()
    {
        return array('id' => $this->data['heroId']);
    }
}