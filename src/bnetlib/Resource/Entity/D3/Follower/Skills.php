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

namespace bnetlib\Resource\Entity\D3\Follower;

use bnetlib\Resource\Entity\EntityInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Skills implements EntityInterface, \Iterator
{
	/**
	 * @var integer
	 */
	protected $position = 0;

	/**
	 * @var array
	 */
	protected $index = array();

	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @var \stdClass|null
	 */
	protected $headers;

	/**
	 * @var ServiceLocatorInterface
	 */
	protected $serviceLocator;

	/**
	 * @inheritdoc
	 */
	public function populate($data)
	{
		// small hack, skip the active and passive level as follower never have any passives
		// also, to check if active exists, if not it is data from the hero API (follower skills).
		list($data, $list) = isset($data['active']) ? array($data['active'], true) : array($data, false);

		foreach ($data as $skill) {
			$class = $this->serviceLocator->get('d3.entity.shared.skill');
			if (isset($this->headers)) {
				$class->setResponseHeaders($this->headers);
			}

			$skillData = ($list) ? $skill : $skill['skill'];
			$class->populate($skillData);

			$this->data[]                    = $class;
			$this->index[$skillData['slug']] = $class;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getResponseHeaders()
	{
		return $this->headers;
	}

	/**
	 * @inheritdoc
	 */
	public function setResponseHeaders($headers)
	{
		$this->headers = $headers;
	}

	/**
	 * @inheritdoc
	 */
	public function setServiceLocator(ServiceLocatorInterface $locator)
	{
		$this->serviceLocator = $locator;
	}

	/**
	 * @param  string $slug
	 * @return boolean
	 */
	public function hasSlug($slug)
	{
		return isset($this->index[$slug]);
	}

	/**
	 * @param  string $slug
	 * @return \bnetlib\Resource\Entity\D3\Shared\Skill|null
	 */
	public function getBySlug($slug)
	{
		if (!isset($this->index[$slug])) {
			return $this->index[$slug];
		}

		return null;
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		return $this->data;
	}

	/**
	 * @see \Iterator
	 */
	public function rewind()
	{
		$this->position = 0;
	}

	/**
	 * @see    \Iterator
	 * @return \bnetlib\Resource\Entity\D3\Shared\Skill
	 */
	public function current()
	{
		return $this->data[$this->position];
	}

	/**
	 * @see    \Iterator
	 * @return integer
	 */
	public function key()
	{
		return $this->position;
	}

	/**
	 * @see \Iterator
	 */
	public function next()
	{
		++$this->position;
	}

	/**
	 * @see    \Iterator
	 * @return boolean
	 */
	public function valid()
	{
		return isset($this->data[$this->position]);
	}
}