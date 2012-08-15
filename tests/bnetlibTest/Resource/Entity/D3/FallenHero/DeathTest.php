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

use bnetlib\Resource\Entity\D3\FallenHero\Death;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class DeathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\FallenHero\Death
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Death();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['fallenHeroes'][0]['death']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testLocation()
    {
        $this->assertEquals(80589, self::$obj->getLocation());
    }

    public function testKiller()
    {
        $this->assertEquals(5193, self::$obj->getKiller());
    }

    public function testTime()
    {
        $this->assertEquals(1338723251, self::$obj->getTime());
    }

    public function testDateTime()
    {
        $this->assertInstanceOf('DateTime', self::$obj->getDateTime());
    }
}