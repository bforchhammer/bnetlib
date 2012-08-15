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

namespace bnetlibTest\Resource\Entity\D3\Shared;

use bnetlib\Resource\Entity\D3\Shared\Item;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class ItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Shared\Item
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Item();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['fallenHeroes'][0]['items']['head']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testName()
    {
        $this->assertEquals('Adventuring Coif of the Bear', self::$obj->getName());
    }

    public function testIcon()
    {
        $this->assertEquals('helm_003', self::$obj->getIcon());
    }

    public function testDisplayColor()
    {
        $this->assertEquals('blue', self::$obj->getDisplayColor());
    }

    public function testTooltipParams()
    {
        $this->assertEquals('item-data/CPyvmqADEgcIBBX48E5dHS2lvowdGpZAYDAJOOcDQABQCGDiBA', self::$obj->getTooltipParams());
    }

    public function testIsBlue()
    {
        $this->assertTrue(self::$obj->isBlue());
    }

    public function testIsNotYellow()
    {
        $this->assertFalse(self::$obj->isYellow());
    }

    public function testIsNotOrange()
    {
        $this->assertFalse(self::$obj->isOrange());
    }
}