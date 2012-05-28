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
 * @subpackage UnitTests
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

namespace bnetlibTest\Resource\Wow\Shared;

use bnetlib\ServiceLocator\ServiceLocator;
use bnetlib\Resource\Wow\Shared\ListData;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage UnitTests
 * @group      WorldOFWarcraft
 * @group      WoW_Shared
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class ListDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Wow\Shared\ListData
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data            = array();
        $data['content'] = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/character.json'
        ), true);;

        self::$obj = new ListData();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['content']['quests']);

    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testCountable()
    {
        $this->assertEquals(5, count(self::$obj));
    }

    public function testIterator()
    {
        foreach (self::$obj as $key => $item) {
            $this->assertInternalType('integer', $item);
        }
    }

    public function testHas()
    {
        $this->assertTrue(self::$obj->has(13136));
    }
}