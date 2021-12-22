<?php
/**
 * Copyright (c) 2021. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\SeoCanonicalAdminUi\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class AssociatedCanonicalProduct implements OptionSourceInterface
{

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 0, 'label' => __('Default')],
            ['value' => 1, 'label' => __('Parent Product')],
        ];
    }
}
