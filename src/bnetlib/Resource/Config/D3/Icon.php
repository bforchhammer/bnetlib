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

namespace bnetlib\Resource\Config\D3;

use bnetlib\Exception\DomainException;
use bnetlib\Resource\Config\ConfigurationInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage WorldOfWarcraft
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Icon implements ConfigurationInterface
{
    /**
     * @var string
     */
    const RESOURCE_URL = '%s/d3/icons/items/%s/%s.png';

    /**
     * @var integer
     */
    protected $resourceType = self::TYPE_DYNAMIC_URL;

    /**
     * @var array
     */
    protected $argumentAliases = array('size' => 'iconsize');

    /**
     * @var array
     */
    protected $requiredArguments = array('region', 'size', 'icon');

    /**
     * @var array
     */
    protected $manipulableArguments;

    /**
     * Setting closures.
     */
    public function __construct()
    {
        $size = function ($v) {
            if (!in_array((integer) $v, array('small', 'large'))) {
                throw new DomainException(sprintf(
                    '%s is not a valid size. Valid sizes are small or large.', $v
                ));
            }
            return $v;
        };

        $region = function ($v) {
            $name = 'bnetlib\Connection\ConnectionInterface::HOST_MEDIA_' . strtoupper($v);
            if (defined($name)) {
                return constant($name);
            }

            throw new DomainException(sprintf('Unable to find a media host for %s.', $v));
        };

        $this->manipulableArguments = array(
            'size'     => $size,
            'iconsize' => $size,
            'region'   => $region,
        );
    }


    /**
     * @inheritdoc
     */
    public function isJson()
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getResourceType()
    {
        return $this->resourceType;
    }

    /**
     * @inheritdoc
     */
    public function getArgumentAliases()
    {
        return $this->argumentAliases;
    }

    /**
     * @inheritdoc
     */
    public function getRequiredArguments()
    {
        return $this->requiredArguments;
    }

    /**
     * @inheritdoc
     */
    public function getOptionalArguments()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getManipulableArguments()
    {
        return $this->manipulableArguments;
    }

    /**
     * @inheritdoc
     */
    public function isAuthenticationPossible()
    {
        return false;
    }
}