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
 * @license    https://gitbub.com/coss/bnetlib/LISENCE     MIT License
 */

namespace bnetlib\Resource\Wow\Character;

use bnetlib\Resource\ResourceInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    https://gitbub.com/coss/bnetlib/LISENCE     MIT License
 */
class Pvp implements ResourceInterface
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
     * @inheritdoc
     */
    public function populate(array $data)
    {
        $this->data['kills'] = $data['totalHonorableKills'];

        $this->data['rbg'] = new RatedBattlegrounds();
        if (isset($this->headers)) {
            $this->data['rbg']->setResponseHeaders($this->headers);
        }
        $this->data['rbg']->populate($data['ratedBattlegrounds']);

        $this->data['arena'] = new ArenaTeams();
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
    public function setResponseHeaders(\stdClass $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return int
     */
    public function getKills()
    {
        return $this->data['kills'];
    }

    /**
     * @return bnetlib\Resource\Wow\Character\RatedBattlegrounds
     */
    public function getRatedBattlegrounds()
    {
        return $this->data['rbg'];
    }

    /**
     * @return bnetlib\Resource\Wow\Character\ArenaTeams
     */
    public function getArenaTeams()
    {
        return $this->data['arena'];
    }
}