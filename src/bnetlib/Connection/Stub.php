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

use bnetlib\Exception\ClientException;
use bnetlib\Exception\RuntimeException;
use bnetlib\ServiceLocator\ServiceLocator;

/**
 * @category  bnetlib
 * @package   Connection
 * @copyright 2012 Eric Boh <cossish@gmail.com>
 * @license   http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Stub extends AbstractConnection
{
    /**
     * @var array
     */
    protected $map;

    /**
     * @var array
     */
    protected $memory;

    /**
     * @param ServiceLocator $locator
     * @param array          $option
     */
    public function __construct(ServiceLocator $locator = null, array $option = null)
    {
        $this->client = ($locator) ?: new ServiceLocator();

        $this->option['stub'] = array(
            'memory' => true,
            'fake'   => true,
            'path'   => dirname(__DIR__) . '/../../data/Fixtures',
        );

        if (is_array($option)) {
            $this->setOptions($option);
        }
    }

    /**
     * @inheritdoc
     */
    public function request(array $params)
    {
        try {
            $status = 200;

            if (!isset($this->map)) {
                if (!is_callable(array($this->client, 'getRegisteredServices')) {
                    throw new RuntimeException(sprintf(
                        '%s must implement the method getRegisteredServices. ' .
                        'Otherwise the stub adapter won\'t work.',
                        get_class($this->client);
                    ));
                }

                $this->map = array();
                $services  = $this->client->getRegisteredServices();

                foreach ($services as $service => $class) {
                    if (strpos($service, '.config.') !== false) {
                        $this->map[$class] = str_replace('.config.', '/', $service);
                    }
                }
            }

            $class = get_class($params['config']);

            if (!isset($this->map[$class])) {
                throw new ClientException('Unable to locate service in ServiceLocator.');
            }

            $content = null;

            if (isset($this->memory[$this->map[$class]])) {
                $content = $this->memory[$this->map[$class]];
            } else {
                $fullname = $this->option['stub']['path'] . '/' . $this->map[$class] . '.json';

                if (file_exists($fullname)) {
                    $content = file_get_contents($fullname);
                } else {
                    $status  = 404;
                    $content = '{"status":"nok", "reason": "When in doubt, blow it up. (page not found)"}';
                }

                $content = $this->decodeJson($content);

                if (!isset($content['headers'])) {
                    $content['headers'] = array(
                        'Connection' => 'close',
                        'Server'     => 'Apache',
                        /**
                         * Note: DATE_RFC1123 my not be RFC 1123 compliant, depending on your platform.
                         * @see http://www.php.net/manual/de/function.gmdate.php#25031
                         */
                        'Date'       => gmdate('D, d M Y H:i:s \G\M\T'),
                    );
                }

                if ($params['config']->isJson()) {
                    $content['content'] = json_encode($content['content']);
                } else {
                    if (substr($content['content'], 0, 7) === 'base64,') {
                        $content['content'] = base64_decode(substr($content['content'], 7));
                    }
                }
            }

            if ($this->option['stub']['memory'] === true) {
                $this->memory[$this->map[$class]] = $content;
            }

            if (isset($content['headers']['Last-Modified'])) {
                $stringToTimestamp = function ($string) {
                    if ($string === null) {
                        return null;
                    }

                    $dt = \DateTime::createFromFormat(
                        'D, d M Y H:i:s \G\M\T',
                        $string,
                        new \DateTimeZone('UTC')
                    );

                    return ($dt === false) ? null : $dt->getTimestamp();
                };

                $paramMod   = $stringToTimestamp($params['lastmodified']);
                $contentMod = $stringToTimestamp($content['headers']['Last-Modified']);

                if ($paramMod !== null && $contentMod !== null && $paramMod < $contentMod) {
                    $status  = 429;
                    $content = array(
                        'headers' => array(
                            'Connection' => 'close',
                            'Server'     => 'Apache',
                            /**
                             * Note: DATE_RFC1123 my not be RFC 1123 compliant, depending on your platform.
                             * @see http://www.php.net/manual/de/function.gmdate.php#25031
                             */
                            'Date'       => gmdate('D, d M Y H:i:s \G\M\T'),
                        ),
                        'body' => '',
                    );
                }
            }

            if ($this->option['responseheader'] === false) {
                $content['headers'] = null;
            } else {
                $this->lastResponseHeaders = $content['headers'];
            }

        } catch (ClientException $e) {
            throw new ClientException('Client exception catched, use getPrevious().', 0, $e);
        }

        return $this->createResponse($params['config']->isJson(), $status, $content['content'], $content['headers']);
    }

    /**
     * @inheritdoc
     */
    public function setOptions(array $option)
    {
        if (isset($option['stub'])) {
            if (isset($option['stub']['memory'])) {
                $this->option['stub']['memory'] = $option['stub']['memory'];

                if ($option['stub']['memory'] === false) {
                    unset($this->memory);
                }
            }
            if (isset($option['stub']['path'])) {
                $this->option['stub']['path'] = $option['stub']['path'];
            }
        }

        return parent::setOptions($option);
    }
}
