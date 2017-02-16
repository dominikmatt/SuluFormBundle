<?php
/*
 * This file is part of Sulu.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\FormBundle\Dynamic\Collections;

use Sulu\Bundle\FormBundle\Dynamic\FormCollectionTitleInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * The attached structure type.
 */
class Page implements FormCollectionTitleInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle($type, $typeId)
    {
        $request = $this->requestStack->getMasterRequest();
        $structure = $request->attributes->get('structure');

        return $structure->getProperty('title')->getValue();
    }
}
