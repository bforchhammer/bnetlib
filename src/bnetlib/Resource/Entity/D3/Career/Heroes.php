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

namespace bnetlib\Resource\Entity\D3\Career;

use bnetlib\Resource\Entity\D3\Shared\Heroes as BaseHeroes;
use bnetlib\ServiceLocator\ServiceLocatorInterface;

/**
 * @category   bnetlib
 * @package    Resource
 * @subpackage Diablo3
 * @copyright  2012 Eric Boh <cossish@gmail.com>
 * @license    http://coss.gitbub.com/bnetlib/license.html    MIT License
 */
class Heroes extends BaseHeroes
{
    /**
     * @inheritdoc
     */
    public function populate($data)
    {
        foreach ($data as $hero) {
            $class   = $this->serviceLocator->get('d3.entity.shared.hero');
            if (isset($this->headers)) {
                $class->setResponseHeaders($this->headers);
            }
            $class->populate($hero);

            $this->data[]                         = $class;
            $this->index['id'][$hero['id']][]     = $class;
            $this->index['name'][$hero['name']][] = $class;
        }
    }
}