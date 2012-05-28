<?php
/**
 * This file is part of the bnetlib Library.
 * Copyright (c) 2012 Eric Boh <cossish@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code. You can also view the
 * LICENSE file online at https://gitbub.com/coss/bnetlib/LISENCE
 *
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */

return array(
    'bnetlib\AbstractGame'                                       => __DIR__ . '/AbstractGame.php',
    'bnetlib\Connection\AbstractConnection'                      => __DIR__ . '/Connection/AbstractConnection.php',
    'bnetlib\Connection\Buzz'                                    => __DIR__ . '/Connection/Buzz.php',
    'bnetlib\Connection\ConnectionInterface'                     => __DIR__ . '/Connection/ConnectionInterface.php',
    'bnetlib\Connection\Stub'                                    => __DIR__ . '/Connection/Stub.php',
    'bnetlib\Connection\ZendFramework'                           => __DIR__ . '/Connection/ZendFramework.php',
    'bnetlib\Exception\BadMethodCallException'                   => __DIR__ . '/Exception/BadMethodCallException.php',
    'bnetlib\Exception\CacheException'                           => __DIR__ . '/Exception/CacheException.php',
    'bnetlib\Exception\ClientException'                          => __DIR__ . '/Exception/ClientException.php',
    'bnetlib\Exception\DomainException'                          => __DIR__ . '/Exception/DomainException.php',
    'bnetlib\Exception\ExceptionInterface'                       => __DIR__ . '/Exception/ExceptionInterface.php',
    'bnetlib\Exception\InvalidAppException'                      => __DIR__ . '/Exception/InvalidAppException.php',
    'bnetlib\Exception\InvalidAppPermissionsException'           => __DIR__ . '/Exception/InvalidAppPermissionsException.php',
    'bnetlib\Exception\InvalidAppSignatureException'             => __DIR__ . '/Exception/InvalidAppSignatureException.php',
    'bnetlib\Exception\InvalidArgumentException'                 => __DIR__ . '/Exception/InvalidArgumentException.php',
    'bnetlib\Exception\InvalidAuthHeaderException'               => __DIR__ . '/Exception/InvalidAuthHeaderException.php',
    'bnetlib\Exception\InvalidServiceNameException'              => __DIR__ . '/Exception/InvalidServiceNameException.php',
    'bnetlib\Exception\JsonException'                            => __DIR__ . '/Exception/JsonException.php',
    'bnetlib\Exception\LengthException'                          => __DIR__ . '/Exception/LengthException.php',
    'bnetlib\Exception\LogicException'                           => __DIR__ . '/Exception/LogicException.php',
    'bnetlib\Exception\PageNotFoundException'                    => __DIR__ . '/Exception/PageNotFoundException.php',
    'bnetlib\Exception\RequestBlockedException'                  => __DIR__ . '/Exception/RequestBlockedException.php',
    'bnetlib\Exception\RequestsThrottledException'               => __DIR__ . '/Exception/RequestsThrottledException.php',
    'bnetlib\Exception\ResponseExceptionInterface'               => __DIR__ . '/Exception/ResponseExceptionInterface.php',
    'bnetlib\Exception\RuntimeException'                         => __DIR__ . '/Exception/RuntimeException.php',
    'bnetlib\Exception\ServerErrorException'                     => __DIR__ . '/Exception/ServerErrorException.php',
    'bnetlib\Exception\ServerUnavailableException'               => __DIR__ . '/Exception/ServerUnavailableException.php',
    'bnetlib\Exception\ServiceNotCreatedException'               => __DIR__ . '/Exception/ServiceNotCreatedException.php',
    'bnetlib\Exception\UnexpectedResponseException'              => __DIR__ . '/Exception/UnexpectedResponseException.php',
    'bnetlib\Exception\UnknownErrorException'                    => __DIR__ . '/Exception/UnknownErrorException.php',
    'bnetlib\Locale\Locale'                                      => __DIR__ . '/Locale/Locale.php',
    'bnetlib\Locale\LocaleAwareInterface'                        => __DIR__ . '/Locale/LocaleAwareInterface.php',
    'bnetlib\Locale\LocaleInterface'                             => __DIR__ . '/Locale/LocaleInterface.php',
    'bnetlib\Resource\ConfigurationInterface'                    => __DIR__ . '/Resource/ConfigurationInterface.php',
    'bnetlib\Resource\ConsumeInterface'                          => __DIR__ . '/Resource/ConsumeInterface.php',
    'bnetlib\Resource\ResourceInterface'                         => __DIR__ . '/Resource/ResourceInterface.php',
    'bnetlib\Resource\Shared\Fallback'                           => __DIR__ . '/Resource/Shared/Fallback.php',
    'bnetlib\Resource\Shared\File'                               => __DIR__ . '/Resource/Shared/File.php',
    'bnetlib\Resource\Wow\Achievement'                           => __DIR__ . '/Resource/Wow/Achievement.php',
    'bnetlib\Resource\Wow\Achievements\Achievement'              => __DIR__ . '/Resource/Wow/Achievements/Achievement.php',
    'bnetlib\Resource\Wow\Achievements\Achievements'             => __DIR__ . '/Resource/Wow/Achievements/Achievements.php',
    'bnetlib\Resource\Wow\Achievements\Criteria'                 => __DIR__ . '/Resource/Wow/Achievements/Criteria.php',
    'bnetlib\Resource\Wow\Achievements\DataAchievement'          => __DIR__ . '/Resource/Wow/Achievements/DataAchievement.php',
    'bnetlib\Resource\Wow\Achievements\DataAchievements'         => __DIR__ . '/Resource/Wow/Achievements/DataAchievements.php',
    'bnetlib\Resource\Wow\Achievements'                          => __DIR__ . '/Resource/Wow/Achievements.php',
    'bnetlib\Resource\Wow\Arena\Character'                       => __DIR__ . '/Resource/Wow/Arena/Character.php',
    'bnetlib\Resource\Wow\Arena\Statistic'                       => __DIR__ . '/Resource/Wow/Arena/Statistic.php',
    'bnetlib\Resource\Wow\ArenaLadder'                           => __DIR__ . '/Resource/Wow/ArenaLadder.php',
    'bnetlib\Resource\Wow\ArenaTeam'                             => __DIR__ . '/Resource/Wow/ArenaTeam.php',
    'bnetlib\Resource\Wow\Auction\Auction'                       => __DIR__ . '/Resource/Wow/Auction/Auction.php',
    'bnetlib\Resource\Wow\Auction\Faction'                       => __DIR__ . '/Resource/Wow/Auction/Faction.php',
    'bnetlib\Resource\Wow\Auction'                               => __DIR__ . '/Resource/Wow/Auction.php',
    'bnetlib\Resource\Wow\AuctionData'                           => __DIR__ . '/Resource/Wow/AuctionData.php',
    'bnetlib\Resource\Wow\Battlegroups\Battlegroup'              => __DIR__ . '/Resource/Wow/Battlegroups/Battlegroup.php',
    'bnetlib\Resource\Wow\Battlegroups'                          => __DIR__ . '/Resource/Wow/Battlegroups.php',
    'bnetlib\Resource\Wow\Character\Appearance'                  => __DIR__ . '/Resource/Wow/Character/Appearance.php',
    'bnetlib\Resource\Wow\Character\ArenaTeam'                   => __DIR__ . '/Resource/Wow/Character/ArenaTeam.php',
    'bnetlib\Resource\Wow\Character\ArenaTeams'                  => __DIR__ . '/Resource/Wow/Character/ArenaTeams.php',
    'bnetlib\Resource\Wow\Character\ClassData'                   => __DIR__ . '/Resource/Wow/Character/ClassData.php',
    'bnetlib\Resource\Wow\Character\Faction'                     => __DIR__ . '/Resource/Wow/Character/Faction.php',
    'bnetlib\Resource\Wow\Character\Feed'                        => __DIR__ . '/Resource/Wow/Character/Feed.php',
    'bnetlib\Resource\Wow\Character\FeedEntry'                   => __DIR__ . '/Resource/Wow/Character/FeedEntry.php',
    'bnetlib\Resource\Wow\Character\Glyph'                       => __DIR__ . '/Resource/Wow/Character/Glyph.php',
    'bnetlib\Resource\Wow\Character\Glyphs'                      => __DIR__ . '/Resource/Wow/Character/Glyphs.php',
    'bnetlib\Resource\Wow\Character\Guild'                       => __DIR__ . '/Resource/Wow/Character/Guild.php',
    'bnetlib\Resource\Wow\Character\Instance'                    => __DIR__ . '/Resource/Wow/Character/Instance.php',
    'bnetlib\Resource\Wow\Character\Item'                        => __DIR__ . '/Resource/Wow/Character/Item.php',
    'bnetlib\Resource\Wow\Character\Items'                       => __DIR__ . '/Resource/Wow/Character/Items.php',
    'bnetlib\Resource\Wow\Character\Pet'                         => __DIR__ . '/Resource/Wow/Character/Pet.php',
    'bnetlib\Resource\Wow\Character\Pets'                        => __DIR__ . '/Resource/Wow/Character/Pets.php',
    'bnetlib\Resource\Wow\Character\Profession'                  => __DIR__ . '/Resource/Wow/Character/Profession.php',
    'bnetlib\Resource\Wow\Character\Professions'                 => __DIR__ . '/Resource/Wow/Character/Professions.php',
    'bnetlib\Resource\Wow\Character\Progression'                 => __DIR__ . '/Resource/Wow/Character/Progression.php',
    'bnetlib\Resource\Wow\Character\Pvp'                         => __DIR__ . '/Resource/Wow/Character/Pvp.php',
    'bnetlib\Resource\Wow\Character\Race'                        => __DIR__ . '/Resource/Wow/Character/Race.php',
    'bnetlib\Resource\Wow\Character\RatedBattlegrounds'          => __DIR__ . '/Resource/Wow/Character/RatedBattlegrounds.php',
    'bnetlib\Resource\Wow\Character\Record'                      => __DIR__ . '/Resource/Wow/Character/Record.php',
    'bnetlib\Resource\Wow\Character\Reputation'                  => __DIR__ . '/Resource/Wow/Character/Reputation.php',
    'bnetlib\Resource\Wow\Character\Stats'                       => __DIR__ . '/Resource/Wow/Character/Stats.php',
    'bnetlib\Resource\Wow\Character\Talents'                     => __DIR__ . '/Resource/Wow/Character/Talents.php',
    'bnetlib\Resource\Wow\Character\TalentSpecialization'        => __DIR__ . '/Resource/Wow/Character/TalentSpecialization.php',
    'bnetlib\Resource\Wow\Character\Title'                       => __DIR__ . '/Resource/Wow/Character/Title.php',
    'bnetlib\Resource\Wow\Character\Titles'                      => __DIR__ . '/Resource/Wow/Character/Titles.php',
    'bnetlib\Resource\Wow\Character'                             => __DIR__ . '/Resource/Wow/Character.php',
    'bnetlib\Resource\Wow\CharacterClasses'                      => __DIR__ . '/Resource/Wow/CharacterClasses.php',
    'bnetlib\Resource\Wow\CharacterRaces'                        => __DIR__ . '/Resource/Wow/CharacterRaces.php',
    'bnetlib\Resource\Wow\Configuration\Achievement'             => __DIR__ . '/Resource/Wow/Configuration/Achievement.php',
    'bnetlib\Resource\Wow\Configuration\ArenaLadder'             => __DIR__ . '/Resource/Wow/Configuration/ArenaLadder.php',
    'bnetlib\Resource\Wow\Configuration\ArenaTeam'               => __DIR__ . '/Resource/Wow/Configuration/ArenaTeam.php',
    'bnetlib\Resource\Wow\Configuration\Auction'                 => __DIR__ . '/Resource/Wow/Configuration/Auction.php',
    'bnetlib\Resource\Wow\Configuration\AuctionData'             => __DIR__ . '/Resource/Wow/Configuration/AuctionData.php',
    'bnetlib\Resource\Wow\Configuration\Battlegroups'            => __DIR__ . '/Resource/Wow/Configuration/Battlegroups.php',
    'bnetlib\Resource\Wow\Configuration\Character'               => __DIR__ . '/Resource/Wow/Configuration/Character.php',
    'bnetlib\Resource\Wow\Configuration\CharacterAchievements'   => __DIR__ . '/Resource/Wow/Configuration/CharacterAchievements.php',
    'bnetlib\Resource\Wow\Configuration\CharacterClasses'        => __DIR__ . '/Resource/Wow/Configuration/CharacterClasses.php',
    'bnetlib\Resource\Wow\Configuration\CharacterRaces'          => __DIR__ . '/Resource/Wow/Configuration/CharacterRaces.php',
    'bnetlib\Resource\Wow\Configuration\Guild'                   => __DIR__ . '/Resource/Wow/Configuration/Guild.php',
    'bnetlib\Resource\Wow\Configuration\GuildAchievements'       => __DIR__ . '/Resource/Wow/Configuration/GuildAchievements.php',
    'bnetlib\Resource\Wow\Configuration\GuildPerks'              => __DIR__ . '/Resource/Wow/Configuration/GuildPerks.php',
    'bnetlib\Resource\Wow\Configuration\GuildRewards'            => __DIR__ . '/Resource/Wow/Configuration/GuildRewards.php',
    'bnetlib\Resource\Wow\Configuration\Item'                    => __DIR__ . '/Resource/Wow/Configuration/Item.php',
    'bnetlib\Resource\Wow\Configuration\ItemClasses'             => __DIR__ . '/Resource/Wow/Configuration/ItemClasses.php',
    'bnetlib\Resource\Wow\Configuration\ItemSet'                 => __DIR__ . '/Resource/Wow/Configuration/ItemSet.php',
    'bnetlib\Resource\Wow\Configuration\Quest'                   => __DIR__ . '/Resource/Wow/Configuration/Quest.php',
    'bnetlib\Resource\Wow\Configuration\RatedBattlegroundLadder' => __DIR__ . '/Resource/Wow/Configuration/RatedBattlegroundLadder.php',
    'bnetlib\Resource\Wow\Configuration\Realms'                  => __DIR__ . '/Resource/Wow/Configuration/Realms.php',
    'bnetlib\Resource\Wow\Configuration\Recipe'                  => __DIR__ . '/Resource/Wow/Configuration/Recipe.php',
    'bnetlib\Resource\Wow\Configuration\Thumbnail'               => __DIR__ . '/Resource/Wow/Configuration/Thumbnail.php',
    'bnetlib\Resource\Wow\Guild\Member'                          => __DIR__ . '/Resource/Wow/Guild/Member.php',
    'bnetlib\Resource\Wow\Guild\Members'                         => __DIR__ . '/Resource/Wow/Guild/Members.php',
    'bnetlib\Resource\Wow\Guild\News'                            => __DIR__ . '/Resource/Wow/Guild/News.php',
    'bnetlib\Resource\Wow\Guild\NewsEntry'                       => __DIR__ . '/Resource/Wow/Guild/NewsEntry.php',
    'bnetlib\Resource\Wow\Guild\Perk'                            => __DIR__ . '/Resource/Wow/Guild/Perk.php',
    'bnetlib\Resource\Wow\Guild\Reward'                          => __DIR__ . '/Resource/Wow/Guild/Reward.php',
    'bnetlib\Resource\Wow\Guild\Spell'                           => __DIR__ . '/Resource/Wow/Guild/Spell.php',
    'bnetlib\Resource\Wow\Guild'                                 => __DIR__ . '/Resource/Wow/Guild.php',
    'bnetlib\Resource\Wow\GuildPerks'                            => __DIR__ . '/Resource/Wow/GuildPerks.php',
    'bnetlib\Resource\Wow\GuildRewards'                          => __DIR__ . '/Resource/Wow/GuildRewards.php',
    'bnetlib\Resource\Wow\Item\BonusStats'                       => __DIR__ . '/Resource/Wow/Item/BonusStats.php',
    'bnetlib\Resource\Wow\Item\ClassData'                        => __DIR__ . '/Resource/Wow/Item/ClassData.php',
    'bnetlib\Resource\Wow\Item\Reward'                           => __DIR__ . '/Resource/Wow/Item/Reward.php',
    'bnetlib\Resource\Wow\Item\SocketInfo'                       => __DIR__ . '/Resource/Wow/Item/SocketInfo.php',
    'bnetlib\Resource\Wow\Item\Spell'                            => __DIR__ . '/Resource/Wow/Item/Spell.php',
    'bnetlib\Resource\Wow\Item\Spells'                           => __DIR__ . '/Resource/Wow/Item/Spells.php',
    'bnetlib\Resource\Wow\Item\Stat'                             => __DIR__ . '/Resource/Wow/Item/Stat.php',
    'bnetlib\Resource\Wow\Item\WeaponInfo'                       => __DIR__ . '/Resource/Wow/Item/WeaponInfo.php',
    'bnetlib\Resource\Wow\Item'                                  => __DIR__ . '/Resource/Wow/Item.php',
    'bnetlib\Resource\Wow\ItemClasses'                           => __DIR__ . '/Resource/Wow/ItemClasses.php',
    'bnetlib\Resource\Wow\ItemSet\Bonus'                         => __DIR__ . '/Resource/Wow/ItemSet/Bonus.php',
    'bnetlib\Resource\Wow\ItemSet'                               => __DIR__ . '/Resource/Wow/ItemSet.php',
    'bnetlib\Resource\Wow\Quest'                                 => __DIR__ . '/Resource/Wow/Quest.php',
    'bnetlib\Resource\Wow\RatedBattlegroundLadder'               => __DIR__ . '/Resource/Wow/RatedBattlegroundLadder.php',
    'bnetlib\Resource\Wow\Realms\PvpArea'                        => __DIR__ . '/Resource/Wow/Realms/PvpArea.php',
    'bnetlib\Resource\Wow\Realms\Realm'                          => __DIR__ . '/Resource/Wow/Realms/Realm.php',
    'bnetlib\Resource\Wow\Realms'                                => __DIR__ . '/Resource/Wow/Realms.php',
    'bnetlib\Resource\Wow\Recipe'                                => __DIR__ . '/Resource/Wow/Recipe.php',
    'bnetlib\Resource\Wow\Shared\ArenaTeam'                      => __DIR__ . '/Resource/Wow/Shared/ArenaTeam.php',
    'bnetlib\Resource\Wow\Shared\Character'                      => __DIR__ . '/Resource/Wow/Shared/Character.php',
    'bnetlib\Resource\Wow\Shared\Data'                           => __DIR__ . '/Resource/Wow/Shared/Data.php',
    'bnetlib\Resource\Wow\Shared\GuildEmblem'                    => __DIR__ . '/Resource/Wow/Shared/GuildEmblem.php',
    'bnetlib\Resource\Wow\Shared\Item'                           => __DIR__ . '/Resource/Wow/Shared/Item.php',
    'bnetlib\Resource\Wow\Shared\ListData'                       => __DIR__ . '/Resource/Wow/Shared/ListData.php',
    'bnetlib\ServiceLocator\ServiceLocator'                      => __DIR__ . '/ServiceLocator/ServiceLocator.php',
    'bnetlib\ServiceLocator\ServiceLocatorAwareInterface'        => __DIR__ . '/ServiceLocator/ServiceLocatorAwareInterface.php',
    'bnetlib\ServiceLocator\ServiceLocatorInterface'             => __DIR__ . '/ServiceLocator/ServiceLocatorInterface.php',
    'bnetlib\UrlUtils'                                           => __DIR__ . '/UrlUtils.php',
    'bnetlib\Utility\Faker'                                      => __DIR__ . '/Utility/Faker.php',
    'bnetlib\WorldOfWarcraft'                                    => __DIR__ . '/WorldOfWarcraft.php',
);