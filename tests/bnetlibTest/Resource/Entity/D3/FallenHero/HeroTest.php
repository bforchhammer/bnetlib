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

namespace bnetlibTest\Resource\Entity\D3\FallenHero;

use bnetlib\Resource\Entity\D3\FallenHero\Hero;
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
     * @var bnetlib\Resource\Entity\D3\FallenHero\Hero
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Hero();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['fallenHeroes'][0]);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testId()
    {
        $this->assertEquals(10034591, self::$obj->getId());
    }

    public function testItems()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Hero\Items', self::$obj->getItems());
    }

    public function testStats()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Hero\Stats', self::$obj->getStats());
    }

    public function testKills()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Shared\Kills', self::$obj->getKills());
    }

    public function testDeath()
    {
        $this->assertInstanceOf('bnetlib\Resource\Entity\D3\FallenHero\Death', self::$obj->getDeath());
    }
}