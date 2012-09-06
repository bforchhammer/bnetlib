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
class SkillEntry implements EntityInterface
{
	/**
	 * @var array
	 */
	protected $index = array();

	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @var array
	 */
	protected $services = array(
		'activeskill'  => 'd3.entity.hero.activeskill',
		'passiveskill' => 'd3.entity.hero.passiveskill',
		'rune'         => 'd3.entity.hero.rune',
	);

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
		foreach ($data as $type => $entry) {
			if ($type === 'skill') {
				$serviceName = (isset($entry['flavor'])) ? 'passiveskill' : 'activeskill';
			} else {
				$serviceName = $type;
			}

			$class = $this->serviceLocator->get($this->services[$serviceName]);
			if (isset($this->headers)) {
				$class->setResponseHeaders($this->headers);
			}

			$class->populate($entry);

			$this->data[$type]           = $class;
			$this->index[$entry['slug']] = $class;
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
	 * @return ActiveSkill|PassiveSkill|Rune|null
	 */
	public function getBySlug($slug)
	{
		if (!isset($this->index[$slug])) {
			return $this->index[$slug];
		}

		return null;
	}

	/**
	 * @return ActiveSkill|PassiveSkill
	 */
	public function getSkill()
	{
		return $this->data['skill'];
	}

	/**
	 * @return boolean
	 */
	public function hasRune()
	{
		return isset($this->data['rune']);
	}

	/**
	 * @return Rune|null
	 */
	public function getRune()
	{
		if (isset($this->data['rune'])) {
			return $this->data['rune'];
		}

		return null;
	}
}