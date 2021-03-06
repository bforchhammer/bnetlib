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
 * @subpackage UnitTests
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

namespace bnetlibTest\Resource\Entity\Wow\Guild;

use bnetlib\ServiceLocator\ServiceLocator;
use bnetlib\Resource\Entity\Wow\Guild\NewsEntry;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage UnitTests
 * @group      WorldOfWarcraft
 * @group      WoW_Guild
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class NewsEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\Wow\Guild\NewsEntry
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/guild.json'
        ), true);;

        self::$obj = new NewsEntry();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['news'][4]);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testType()
    {
        $this->assertEquals('guildAchievement', self::$obj->getType());
    }

    public function testTimestamp()
    {
        $this->assertEquals('1335394380000', self::$obj->getTimestamp());
    }

    public function testAchievement()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\Wow\Achievements\DataAchievement', self::$obj->getAchievement());
    }

    public function testCharacter()
    {
        $this->assertEquals('Dustin', self::$obj->getCharacter());
    }

    public function testItemId()
    {
        $this->assertNull(self::$obj->getItemId());
    }

    public function testLevelUp()
    {
        $this->assertNull(self::$obj->getLevelUp());
    }

    public function testIsNotItemType()
    {
        $this->assertFalse(self::$obj->isItemType());
    }

    public function testIsGuildType()
    {
        $this->assertTrue(self::$obj->isGuildType());
    }

    public function testIsNotPlayerType()
    {
        $this->assertFalse(self::$obj->isPlayerType());
    }
}