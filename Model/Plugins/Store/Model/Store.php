<?php
/**
 * @copyright Copyright © 2019 ScientiaMobile. All rights reserved.
 * @author    pasichnikroman@gmail.com
 */

namespace ScientiaMobile\IO\Model\Plugins\Store\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Url\ScopeInterface as Subject;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\Store as ModelStore;

class Store
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var ModelStore
     */
    private $store;

    /**
     * Store constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param ModelStore $store
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        ModelStore $store
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->store = $store;
    }

    /**
     * After get by URL
     *
     * @param Subject $subject
     * @param string $baseUrl
     * @param string $type
     * @param null $secure
     * @return mixed|string
     */
    public function afterGetBaseUrl(
        Subject $subject,
        string  $baseUrl,
        $type = UrlInterface::URL_TYPE_LINK,
        $secure = null
    ) {
        $status = $this->scopeConfig->getValue(
            'smimageoptimization/general/enable',
            ScopeInterface::SCOPE_STORE
        );

        if ($type == UrlInterface::URL_TYPE_MEDIA && $status) {
            if ($this->store->isCurrentlySecure()) {
                $baseUrl = $this->scopeConfig->getValue(
                    'web/secure/base_media_url',
                    ScopeInterface::SCOPE_STORE
                );
            } else {
                $baseUrl = $this->scopeConfig->getValue(
                    'web/unsecure/base_media_url',
                    ScopeInterface::SCOPE_STORE
                );
            }
        }
        return $baseUrl;
    }
}
