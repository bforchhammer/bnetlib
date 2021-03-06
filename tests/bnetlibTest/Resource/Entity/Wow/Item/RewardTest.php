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

namespace bnetlibTest\Resource\Entity\Wow\Item;

use bnetlib\ServiceLocator\ServiceLocator;
use bnetlib\Resource\Entity\Wow\Item\Reward;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage UnitTests
 * @group      WorldOfWarcraft
 * @group      WoW_Item
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class RewardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var bnetlib\Resource\Entity\Wow\Item\Item
     */
    protected static $obj;

    public static function setUpBeforeClass()
    {
        $data = json_decode(file_get_contents(
            dirname(__DIR__) . '/fixtures/character_achievements.json'
        ), true);

        self::$obj = new Reward();
        self::$obj->setServiceLocator(new ServiceLocator());
        self::$obj->populate($data['achievements'][1]['achievements'][1]['rewardItem']);
    }

    public static function tearDownAfterClass()
    {
        self::$obj = null;
    }

    public function testIcon()
    {
        $this->assertEquals('inv_chest_cloth_30', self::$obj->getIcon());
    }

    public function testHasNotTooltipParams()
    {
        $this->assertFalse(self::$obj->hasTooltipParams());
    }

    public function testTooltipParams()
    {
        $this->assertInternalType('array', self::$obj->getTooltipParams());
    }
}