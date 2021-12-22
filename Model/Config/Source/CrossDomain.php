<?php
/**
 * Copyright (c) 2021. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\SeoCanonicalAdminUi\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;

class CrossDomain implements OptionSourceInterface
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [['value' => '0', 'label' => 'Default Store URL']];

        foreach ($this->storeManager->getStores() as $store) {
            $secure = '';
            $secureBaseUrl = $store->getBaseUrl(UrlInterface::URL_TYPE_WEB, true);
            if (strpos($secureBaseUrl, 'https://') !== false) {
                $secure = ' [https]';
            }

            $options[] = [
                'value' => $store->getId(),
                'label' => $store->getName() . ' — ' . $store->getBaseUrl() . $secure,
            ];
        }

        return $options;
    }
}
