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

use bnetlib\Resource\Entity\D3\Shared\Act;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class ActTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Shared\Act
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Act();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['progression']['normal']['act1']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testHasCompleted()
    {
        $this->assertTrue(self::$obj->hasCompleted());
    }

    public function testHasCompletedQuests()
    {
        $this->assertTrue(self::$obj->hasCompletedQuests());
    }

    public function testCompletedQuests()
    {
        $this->assertInternalType('array', self::$obj->getCompletedQuests());
    }

    public function testIterator()
    {
        $tested = false;

        foreach (self::$obj as $key => $hero) {
            $tested = true;
            $this->assertInternalType('string', $key);
            $this->assertInternalType('string', $hero);
            break;
        }

        $this->assertTrue($tested);
    }
}