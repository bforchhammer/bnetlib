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

namespace bnetlib\Resource\Entity\Wow\Character;

use bnetlib\Resource\Entity\EntityInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Pvp implements EntityInterface
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var array|null
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
        $this->data['kills'] = $data['totalHonorableKills'];

        $this->data['rbg'] = $this->serviceLocator->get('wow.entity.character.ratedbattlegrounds');
        if (isset($this->headers)) {
            $this->data['rbg']->setResponseHeaders($this->headers);
        }
        $this->data['rbg']->populate($data['ratedBattlegrounds']);

        $this->data['arena'] = $this->serviceLocator->get('wow.entity.character.arenateams');
        if (isset($this->headers)) {
            $this->data['arena']->setResponseHeaders($this->headers);
        }
        $this->data['arena']->populate($data['arenaTeams']);
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
     * @return integer
     */
    public function getKills()
    {
        return $this->data['kills'];
    }

    /**
     * @return RatedBattlegrounds
     */
    public function getRatedBattlegrounds()
    {
        return $this->data['rbg'];
    }

    /**
     * @return ArenaTeams
     */
    public function getArenaTeams()
    {
        return $this->data['arena'];
    }
}