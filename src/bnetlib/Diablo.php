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
 * @package    Game
 * @subpackage Diablo
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.github.com/bnetlib/license.html    MIT License
 */

namespace bnetlib;

use bnetlib\Connection\ConnectionInterface;
use bnetlib\Resource\Entity\ConsumeInterface;

/**
 * @category   bnetlib
 * @package    Game
 * @subpackage Diablo
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 *
 * @method     mixed getArtisan(array|ConsumeInterface $args, array|ConsumeInterface $extra = null)
 * @method     mixed getCareer(array|ConsumeInterface $args, array|ConsumeInterface $extra = null)
 * @method     mixed getFollower(array|ConsumeInterface $args, array|ConsumeInterface $extra = null)
 * @method     mixed getHero(array|ConsumeInterface $args, array|ConsumeInterface $extra = null)
 * @method     mixed getIcon(array|ConsumeInterface $args, array|ConsumeInterface $extra = null)
 * @method     mixed getItem(array|ConsumeInterface $args, array|ConsumeInterface $extra = null)
 */
class Diablo extends AbstractGame
{
    /**
     * @const string
     */
    const SHORT_NAME = 'd3';

    /**
     * @inheritdoc
     */
    protected $resources = array(
    //  'Artisan'  => 'd3.entity.artisan',
        'Career'   => 'd3.entity.career',
        'Follower' => 'd3.entity.follower',
        'Hero'     => 'd3.entity.hero',
        'Icon'     => 'd3.entity.image',
        'Item'     => 'd3.entity.item',
    );

    /**
     * @inheritdoc
     */
    protected $locale = array(
        ConnectionInterface::REGION_US => array(
            ConnectionInterface::LOCALE_US,
            ConnectionInterface::LOCALE_MX,
            ConnectionInterface::LOCALE_BR,
        ),
        ConnectionInterface::REGION_EU => array(
            ConnectionInterface::LOCALE_GB,
            ConnectionInterface::LOCALE_ES,
            ConnectionInterface::LOCALE_FR,
            ConnectionInterface::LOCALE_RU,
            ConnectionInterface::LOCALE_DE,
            ConnectionInterface::LOCALE_IT,
            ConnectionInterface::LOCALE_PT,
        ),
        ConnectionInterface::REGION_KR => array(ConnectionInterface::LOCALE_KR),
        ConnectionInterface::REGION_TW => array(ConnectionInterface::LOCALE_TW),
    );
}
