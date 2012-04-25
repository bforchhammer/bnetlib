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
 * @license    https://gitbub.com/coss/bnetlib/LISENCE     MIT License
 */

namespace bnetlibTest\Resource\Wow\Character;

use bnetlib\Resource\Wow\Character\Talents;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage UnitTests
 * @group      WorldOFWarcraft
 * @group      WoW_Character
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    https://gitbub.com/coss/bnetlib/LISENCE     MIT License
 */
class TalentsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Wow\Character\Talents
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data            = array();
        $data['content'] = json_decode(file_get_contents(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'character.json'
        ), true);;

        self::$obj = new Talents();
        self::$obj->populate($data['content']['talents']);

    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testFristSpec()
    {
        $this->assertInstanceOf('bnetlib\Resource\Wow\Character\TalentSpecialization', self::$obj->getFristSpec());
    }

    public function testSecoundSpec()
    {
        $this->assertInstanceOf('bnetlib\Resource\Wow\Character\TalentSpecialization', self::$obj->getSecoundSpec());
    }

    public function testSelectedSpec()
    {
       $this->assertInstanceOf('bnetlib\Resource\Wow\Character\TalentSpecialization', self::$obj->getSelectedSpec());
    }

    public function testEqualSelectedSpecAndSelectedSpec()
    {
       $this->assertEquals(self::$obj->getSecoundSpec(), self::$obj->getSelectedSpec());
    }

    public function testIterator()
    {
        foreach (self::$obj as $key => $spec) {
            $this->assertInstanceOf('bnetlib\Resource\Wow\Character\TalentSpecialization', $spec);
        }
    }
}