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

namespace bnetlib\Resource\Wow\Guild;

use bnetlib\Resource\ResourceInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Perk implements ResourceInterface
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
     * @var bnetlib\ServiceLocator\ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @inheritdoc
     */
    public function populate($data)
    {
        $class = $this->serviceLocator->get('wow.guild.spell');
        if (isset($this->headers)) {
            $class->setResponseHeaders($this->headers);
        }
        $class->populate($data['spell']);

        $this->data['spell'] = $class;
        $this->data['level'] = $data['guildLevel'];
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
     * @inheritdoc
     */
    public function setServiceLocator(ServiceLocatorInterface $locator)
    {
        $this->serviceLocator = $locator;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->data['level'];
    }

    /**
     * @return bnetlib\Resource\Wow\Guild\Spell
     */
    public function getSpell()
    {
        return $this->data['spell'];
    }
}