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
        self::$obj->populate($data['fallenHeroes'][0]['stats']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testDamageIncrease()
    {
        $this->assertEquals(1.1699999570846558, self::$obj->getDamageIncrease());
    }

    public function testDamageReduction()
    {
        $this->assertEquals(0.24502399563789368, self::$obj->getDamageReduction());
    }

    public function testCritChance()
    {
        $this->assertEquals(0.05000000074505806, self::$obj->getCritChance());
    }

    public function testLife()
    {
        $this->assertEquals(1494, self::$obj->getLife());
    }

    public function testStrength()
    {
        $this->assertEquals(117, self::$obj->getStrength());
    }

    public function testDexterity()
    {
        $this->assertEquals(31, self::$obj->getDexterity());
    }

    public function testIntelligence()
    {
        $this->assertEquals(29, self::$obj->getIntelligence());
    }

    public function testVitality()
    {
        $this->assertEquals(137, self::$obj->getVitality());
    }

    public function testArmor()
    {
        $this->assertEquals(357, self::$obj->getArmor());
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
        $this->assertEquals(68.8183, self::$obj->getDamage());
    }
}