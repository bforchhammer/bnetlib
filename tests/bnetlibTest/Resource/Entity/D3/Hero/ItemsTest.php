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

namespace bnetlibTest\Resource\Entity\D3\Hero;

use bnetlib\Resource\Entity\D3\Hero\Items;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class ItemsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Hero\Items
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Items();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['fallenHeroes'][0]['items']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testHasHead()
    {
        $this->assertTrue(self::$obj->hasHead());
    }

    public function testHead()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getHead());
    }

    public function testHasTorso()
    {
        $this->assertTrue(self::$obj->hasTorso());
    }

    public function testTorso()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getTorso());
    }

    public function testHasFeet()
    {
        $this->assertTrue(self::$obj->hasFeet());
    }

    public function testFeet()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getFeet());
    }

    public function testHasHands()
    {
        $this->assertTrue(self::$obj->hasHands());
    }

    public function testHands()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getHands());
    }

    public function testHasShoulders()
    {
        $this->assertTrue(self::$obj->hasShoulders());
    }

    public function testShoulders()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getShoulders());
    }

    public function testHasLegs()
    {
        $this->assertTrue(self::$obj->hasLegs());
    }

    public function testLegs()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getLegs());
    }

    public function testHasBracers()
    {
        $this->assertTrue(self::$obj->hasBracers());
    }

    public function testBracers()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getBracers());
    }

    public function testHasMainHand()
    {
        $this->assertTrue(self::$obj->hasMainHand());
    }

    public function testMainHand()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getMainHand());
    }

    public function testHasOffHand()
    {
        $this->assertTrue(self::$obj->hasOffHand());
    }

    public function testOffHand()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getOffHand());
    }

    public function testHasWaist()
    {
        $this->assertTrue(self::$obj->hasWaist());
    }

    public function testWaist()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getWaist());
    }

    public function testHasRightFinger()
    {
        $this->assertTrue(self::$obj->hasRightFinger());
    }

    public function testRightFinger()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getRightFinger());
    }

    public function testHasLeftFinger()
    {
        $this->assertTrue(self::$obj->hasLeftFinger());
    }

    public function testLeftFinger()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getLeftFinger());
    }

    public function testHasNeck()
    {
        $this->assertTrue(self::$obj->hasNeck());
    }

    public function testNeck()
    {
        $this->assertInstanceOf('\bnetlib\Resource\Entity\D3\Shared\Item', self::$obj->getNeck());
    }

    public function testToArray()
    {
        $this->assertInternalType('array', self::$obj->toArray());
    }

    public function testIterator()
    {
        $tested = false;

        foreach (self::$obj as $key => $item) {
            $tested = true;
            $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Shared\Item', $item);
            break;
        }

        $this->assertTrue($tested);
    }
}