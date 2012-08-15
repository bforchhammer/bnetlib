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

use bnetlib\Resource\Entity\ConsumeInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Career implements ConsumeInterface, \IteratorAggregate
{
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
     * @var array
     */
    protected $services = array(
        'artisans'         => 'd3.entity.career.artisans',
        'hardcoreArtisans' => 'd3.entity.career.artisans',
        'heroes'           => 'd3.entity.career.heroes',
        'fallenHeroes'     => 'd3.entity.fallenhero.heroes',
        'kills'            => 'd3.entity.career.kills',
        'timePlayed'       => 'd3.entity.career.played',
        'progression'      => 'd3.entity.shared.progress',
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

        $this->data['dateTime'] = new \DateTime(
            '@' . round(($data['lastUpdated'] / 1000), 0),
            new \DateTimeZone('UTC')
        );
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
     * @inheritdoc
     */
    public function consume()
    {
        return array('battletag' => $this->data['battleTag']);
    }

    /**
     * @return string
     */
    public function getBattleTag()
    {
        return $this->data['battleTag'];
    }

    /**
     * @return Career\Heroes
     */
    public function getHeroes()
    {
        return $this->data['heroes'];
    }

    /**
     * @return Career\Heros
     */
    public function getFallenHeroes()
    {
        return $this->data['fallenHeroes'];
    }

    /**
     * @return Shared\Hero
     */
    public function getLastHeroPlayed()
    {
        return $this->data['heroes'][$this->data['lastHeroPlayed']];
    }

    /**
     * @return Career\Artisans
     */
    public function getArtisans()
    {
        return $this->data['artisans'];
    }

    /**
     * @return Career\Artisans
     */
    public function getHardcoreArtisans()
    {
        return $this->data['hardcoreArtisans'];
    }

    /**
     * @return Career\Progression
     */
    public function getProgression()
    {
        return $this->data['progression'];
    }

    /**
     * @return Career\Kills
     */
    public function getKills()
    {
        return $this->data['kills'];
    }

    /**
     * @return Career\Played
     */
    public function getPlayed()
    {
        return $this->data['timePlayed'];
    }

    /**
     * @return integer
     */
    public function getLastUpdated()
    {
        return $this->data['lastUpdated'];
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->data['dateTime'];
    }

    /**
     * @see    \IteratorAggregate
     * @return Career\Heroes
     */
    public function getIterator()
    {
        return $this->data['heroes'];
    }
}