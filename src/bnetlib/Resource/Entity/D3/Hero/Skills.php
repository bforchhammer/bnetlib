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

namespace bnetlib\Resource\Entity\D3\Hero;

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
	 * @var SkillEntry[]
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
		foreach ($data as $type => $skills) {
			// check if there is atleast one entry, because low level horoes may
			// return a emtpy (array(array(), array(), array())) passive value.
			$isEmpty = 0;
			foreach ($skills as $skillEntry) {
				$isEmpty |= empty($skillEntry) ? 0 : 1;
			}

			if ($isEmpty === 0) {
				continue;
			}

			$this->index[$type] = array();

			foreach ($skills as $skillEntry) {
				$class = $this->serviceLocator->get('d3.entity.hero.skillentry');
				if (isset($this->headers)) {
					$class->setResponseHeaders($this->headers);
				}

				$class->populate($skillEntry);

				$this->data[]         = $class;
				$this->index[$type][] = $class;
			}
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
	 * Works as a proxy, queries every skill entry until it found a match.
	 *
	 * @param  string $slug
	 * @return boolean
	 */
	public function hasSlug($slug)
	{
		foreach ($this->data as $entry) {
			if ($entry->hasSlug($slug)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Works as a proxy, queries every skill entry until it found a match.
	 *
	 * @param  string $slug
	 * @return Skill|Rune|null
	 */
	public function getBySlug($slug)
	{
		foreach ($this->data as $entry) {
			if ($entry->hasSlug($slug)) {
				return $entry->getBySlug($slug);
			}
		}

		return null;
	}

	/**
	 * @return SkillEntry[]
	 */
	public function getActive()
	{
		return $this->index['active'];
	}

	/**
	 * Checks if a hero has passive skills, because low level heroes
	 * may not have passive skills.
	 *
	 * @return boolean
	 */
	public function hasPassive()
	{
		return isset($this->index['passive']);
	}

	/**
	 * @return SkillEntry[]|null
	 */
	public function getPassive()
	{
		if (isset($this->index['passive'])) {
			return $this->index['passive'];
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
	 * @return Skill
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