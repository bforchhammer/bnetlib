<?php
/**
 * This file is part of the bnetlib Library.
 * Copyright (c) 2012 Eric Boh <cossish@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code. You can also view the
 * LICENSE file online at http://coss.github.com/bnetlib/license.html
 *
 * @category  bnetlib
 * @package   Connection
 * @copyright 2012 Eric Boh <cossish@gmail.com>
 * @license   http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

namespace bnetlib\Connection;

/**
 * @category  bnetlib
 * @package   Connection
 * @copyright 2012 Eric Boh <cossish@gmail.com>
 * @license   http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
interface ConnectionInterface
{
    /**
     * @var string
     */
    const VERSION = '1.2';

    /**#@+
     * @var string
     */
    const REGION_US = 'us';
    const REGION_EU = 'eu';
    const REGION_KR = 'kr';
    const REGION_TW = 'tw';
    const REGION_CN = 'cn';
    /**#@-*/

    /**#@+
     * @var string
     */
    const HOST_US = 'us.battle.net';
    const HOST_EU = 'eu.battle.net';
    const HOST_KR = 'kr.battle.net';
    const HOST_TW = 'tw.battle.net';
    const HOST_CN = 'www.battlenet.com.cn';
    /**#@-*/

    /**#@+
     * @var string
     */
    const HOST_MEDIA_US = 'us.media.blizzard.com';
    const HOST_MEDIA_EU = 'eu.media.blizzard.com';
    const HOST_MEDIA_KR = 'kr.media.blizzard.com';
    const HOST_MEDIA_TW = 'tw.media.blizzard.com';
    const HOST_MEDIA_CN = 'content.battlenet.com.cn';
    /**#@-*/

    /**#@+
     * @var string
     */
    const LOCALE_US = 'en_US';
    const LOCALE_MX = 'es_MX';
    const LOCALE_GB = 'en_GB';
    const LOCALE_ES = 'es_ES';
    const LOCALE_FR = 'fr_FR';
    const LOCALE_RU = 'ru_RU';
    const LOCALE_DE = 'de_DE';
    const LOCALE_KR = 'ko_KR';
    const LOCALE_TW = 'zh_TW';
    const LOCALE_CN = 'zh_CN';
    const LOCALE_IT = 'it_IT';
    const LOCALE_PT = 'pt_PT';
    const LOCALE_BR = 'pt_BR';
    /**#@-*/

    /**
     * @param  string $region
     * @return string
     */
    public function getHost($region);

    /**
     * @return boolean
     */
    public function doSecureRequest();

    /**
     * @return string
     */
    public function getDefaultRegion();

    /**
     * @param  array $params
     * @return array
     */
    public function request(array $params);

    /**
     * @param  string $region
     * @return string
     */
    public function getDefaultLocale($region);
}