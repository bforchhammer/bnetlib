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

namespace bnetlib\Resource\Entity\Wow;

use bnetlib\Resource\Entity\ConsumeInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Auction implements ConsumeInterface
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
     * @param string $data
     */
    public function populate($data)
    {
        $this->data = $data['files'][0];

        $this->data['date'] = new \DateTime(
            '@' . round(($data['files'][0]['lastModified'] / 1000), 0),
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
        return array('url' => $this->data['url']);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->data['url'];
    }

    /**
     * @return integer
     */
    public function getLastModified()
    {
        return $this->data['lastModified'];
    }

    /**
     * @return integer
     */
    public function getDate()
    {
        return $this->data['date'];
    }
}