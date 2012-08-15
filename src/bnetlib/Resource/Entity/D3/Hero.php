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

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Hero extends Shared\Hero
{
    /**
     * @var array
     */
    protected $services = array(
        'stats'     => 'd3.entity.hero.stats',
        'items'     => 'd3.entity.hero.items',
        'skills'    => 'd3.entity.hero.skills',
        'kills'     => 'd3.entity.shared.kills',
        'progress'  => 'd3.entity.hero.progress',
        'followers' => 'd3.entity.hero.followers',
    );

    /**
     * @inheritdoc
     */
    public function populate($data)
    {
        $this->data = $data;

        foreach ($this->services as $key => $service) {
            if (isset($data[$key]) && !empty($data[$key])) {
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
     * @return Hero\Followers|null
     */
    public function getFollowers()
    {
        if (isset($this->data['followers'])) {
            return $this->data['followers'];
        }
    }

    /**
     * @return Hero\Items
     */
    public function getItems()
    {
        return $this->data['items'];
    }

    /**
     * @return Hero\Skills
     */
    public function getSkills()
    {
        return $this->data['skills'];
    }

    /**
     * @return Hero\Stats
     */
    public function getStats()
    {
        return $this->data['stats'];
    }

    /**
     * @return Hero\Progress
     */
    public function getProgress()
    {
        return $this->data['progress'];
    }

    /**
     * @return integer
     */
    public function getElitesKilled()
    {
        return $this->data['kills']['elites'];
    }

    /**
     * @return integer
     */
    public function getLastUpdated()
    {
        return $this->data['lastUpdated'];
    }

    /**
     * @return integer
     */
    public function getDateTime()
    {
        return $this->data['dateTime'];
    }
}