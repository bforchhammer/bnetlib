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

namespace bnetlib\Resource\Entity\D3\Shared;

use bnetlib\Resource\Entity\ConsumeInterface;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Skill implements ConsumeInterface
{
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
		$this->data = $data;
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
	 * @return string
	 */
	public function getSlug()
	{
		return $this->data['slug'];
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->data['name'];
	}

	/**
	 * @return string
	 */
	public function getIcon()
	{
		return $this->data['icon'];
	}

	/**
	 * @return integer
	 */
	public function getLevel()
	{
		return $this->data['level'];
	}

	/**
	 * @return string
	 */
	public function getTooltipUrl()
	{
		return $this->data['tooltipUrl'];
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->data['description'];
	}

	/**
	 * @return string
	 */
	public function getSimpleDescription()
	{
		return $this->data['simpleDescription'];
	}

	/**
	 * @return integer
	 */
	public function getSkillCalcId()
	{
		return $this->data['skillCalcId'];
	}

	/**
	 * @inheritdoc
	 */
	public function consume()
	{
		return array(
			'skill' => $this->data['slug'],
			'icon'  => $this->data['icon'],
		);
	}
}