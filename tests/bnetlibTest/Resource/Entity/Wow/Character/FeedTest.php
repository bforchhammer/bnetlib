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

namespace bnetlibTest\Resource\Entity\Wow\Character;

use bnetlib\ServiceLocator\ServiceLocator;
use bnetlib\Resource\Entity\Wow\Character\Feed;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage UnitTests
 * @group      WorldOfWarcraft
 * @group      WoW_Character
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class FeedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\Wow\Character\Feed
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/character.json'
        ), true);;

        self::$obj = new Feed();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['feed']);

    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testCountable()
    {
        $this->assertEquals(4, count(self::$obj));
    }

    public function testByType()
    {
        $this->assertInternalType('array', self::$obj->getByType(Feed::TYPE_LOOT));
    }

    public function testIterator()
    {
        $tested = false;

        foreach (self::$obj as $key => $team) {
            $tested = true;
            $this->assertInstanceOf('bnetlib\Resource\Entity\Wow\Character\FeedEntry', $team);
            break;
        }

        $this->assertTrue($tested);
    }
}