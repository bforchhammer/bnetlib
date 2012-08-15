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

use bnetlib\Resource\Entity\D3\Shared\Progress;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class ProgressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\D3\Shared\Progress
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/career.json'
        ), true);

        self::$obj = new Progress();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['progression']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testHasCompletedOnNormal()
    {
        $this->assertTrue(self::$obj->hasCompletedOnDifficulty(Progress::DIFFICULTY_NORMAL));
    }

    public function testHasNotCompletedOnInferno()
    {
        $this->assertFalse(self::$obj->hasCompletedOnDifficulty(Progress::DIFFICULTY_INFERNO));
    }

    public function testGetByDifficulty()
    {
        $this->assertInstanceOf(
            'bnetlib\Resource\Entity\D3\Shared\Difficulty',
            self::$obj->getByDifficulty(Progress::DIFFICULTY_INFERNO)
        );
    }

    public function testIterator()
    {
        $tested = false;

        foreach (self::$obj as $key => $hero) {
            $tested = true;
            $this->assertInstanceOf('bnetlib\Resource\Entity\D3\Shared\Difficulty', $hero);
            break;
        }

        $this->assertTrue($tested);
    }
}