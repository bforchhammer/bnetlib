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

use bnetlib\Resource\Entity\D3\Hero\Stats;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class StatsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Hero\Stats
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Stats();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['fallen-heroes'][0]['stats']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testDamageIncrease()
    {
        $this->assertEquals(0.40, self::$obj->getDamageIncrease());
    }

    public function testDamageReduction()
    {
        $this->assertEquals(0.19, self::$obj->getDamageReduction());
    }

    public function testCritChance()
    {
        $this->assertEquals(0.05, self::$obj->getCritChance());
    }

    public function testLife()
    {
        $this->assertEquals(386, self::$obj->getLife());
    }

    public function testStrength()
    {
        $this->assertEquals(17, self::$obj->getStrength());
    }

    public function testDexterity()
    {
        $this->assertEquals(41, self::$obj->getDexterity());
    }

    public function testIntelligence()
    {
        $this->assertEquals(17, self::$obj->getIntelligence());
    }

    public function testVitality()
    {
        $this->assertEquals(31, self::$obj->getVitality());
    }

    public function testArmor()
    {
        $this->assertEquals(122, self::$obj->getArmor());
    }

    public function testColdResist()
    {
        $this->assertEquals(0, self::$obj->getColdResist());
    }

    public function testFireResist()
    {
        $this->assertEquals(0, self::$obj->getFireResist());
    }

    public function testLightningResist()
    {
        $this->assertEquals(0, self::$obj->getLightningResist());
    }

    public function testPoisonResist()
    {
        $this->assertEquals(0, self::$obj->getPoisonResist());
    }

    public function testArcaneResist()
    {
        $this->assertEquals(0, self::$obj->getArcaneResist());
    }

    public function testDamage()
    {
        $this->assertEquals(14.4294, self::$obj->getDamage());
    }
}