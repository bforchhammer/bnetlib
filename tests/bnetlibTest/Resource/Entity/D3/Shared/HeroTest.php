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

use bnetlib\Resource\Entity\D3\Shared\Hero;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class HeroTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Shared\Hero
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Hero();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['heroes'][0]);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testId()
    {
        $this->assertEquals(4, self::$obj->getId());
    }

    public function testLevel()
    {
        $this->assertEquals(3, self::$obj->getLevel());
    }

    public function testName()
    {
        $this->assertEquals('Dirt', self::$obj->getName());
    }

    public function testIsHardcore()
    {
        $this->assertTrue(self::$obj->isHardcore());
    }

    public function testClass()
    {
        $this->assertEquals('demon-hunter', self::$obj->getClass());
    }

    public function testGender()
    {
        $this->assertEquals(0, self::$obj->getGender());
    }

    public function testIsMale()
    {
        $this->assertTrue(self::$obj->isMale());
    }

    public function testIsFemale()
    {
        $this->assertFalse(self::$obj->isFemale());
    }

    public function testLastUpdated()
    {
        $this->assertEquals(1338522850, self::$obj->getLastUpdated());
    }

    public function testDateTime()
    {
        $this->assertInstanceOf('DateTime', self::$obj->getDateTime());
    }
}