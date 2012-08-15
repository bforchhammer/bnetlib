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

namespace bnetlibTest\Resource\Entity\D3;

use bnetlib\Resource\Entity\D3\Career;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class CareerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Career
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            __DIR__ . '/fixtures/career.json'
        ), true);

        self::$obj = new Career();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testHeroes()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Career\Heroes', self::$obj->getHeroes());
    }

    public function testFallenHeroes()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\FallenHero\Heroes', self::$obj->getFallenHeroes());
    }

    public function testArtisans()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Career\Artisans', self::$obj->getArtisans());
    }

    public function testHardcoreArtisans()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Career\Artisans', self::$obj->getHardcoreArtisans());
    }

    public function testProgression()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Shared\Progress', self::$obj->getProgression());
    }

    public function testKills()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Career\Kills', self::$obj->getKills());
    }

    public function testPlayed()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Career\Played', self::$obj->getPlayed());
    }

    public function testLastUpdated()
    {
        $this->assertEquals(1344520542, self::$obj->getLastUpdated());
    }

    public function testDateTime()
    {
        $this->assertInstanceOf('DateTime', self::$obj->getDateTime());
    }

    public function testIterator()
    {
        $tested = false;

        foreach (self::$obj as $key => $hero) {
            $tested = true;
            $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Shared\Hero', $hero);
            break;
        }

        $this->assertTrue($tested);
    }
}