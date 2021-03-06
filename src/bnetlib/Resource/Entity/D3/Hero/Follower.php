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

use bnetlib\Resource\Entity\ConsumeInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Follower implements ConsumeInterface
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

        $class = $this->serviceLocator->get('d3.entity.follower.items');
        if (isset($this->headers)) {
            $class->setResponseHeaders($this->headers);
        }

        $this->data['items'] = $class->populate($data['items']);

        $class = $this->serviceLocator->get('d3.entity.follower.skills');
        if (isset($this->headers)) {
            $class->setResponseHeaders($this->headers);
        }

        $this->data['skills'] = $class->populate($data['skills']);
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
     * @return string
     */
    public function getSlug()
    {
        return $this->data['slug'];
    }

    /**
     * @return integer
     */
    public function getLevel()
    {
        return $this->data['level'];
    }

    /**
     * @return \bnetlb\Resource\Entity\Follower\Items
     */
    public function getItems()
    {
        return $this->data['items'];
    }

    /**
     * @return \bnetlb\Resource\Entity\Follower\Skills
     */
    public function getSkills()
    {
        return $this->data['skills'];
    }

    /**
     * @inheritdoc
     */
    public function consume()
    {
        return array('follower' => $this->data['slug']);
    }
}
