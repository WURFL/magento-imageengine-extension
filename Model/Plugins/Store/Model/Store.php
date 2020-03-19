<?php
/**
 * ChangeResult.php
 *
 * @copyright Copyright © 2019 ScientiaMobile. All rights reserved.
 * @author    pasichnikroman@gmail.com
 */

namespace ScientiaMobile\IO\Model\Plugins\Store\Model;

use \Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Store
 * @package ScientiaMobile\IO\Model\Plugins\Store\Model
 */
class Store
{

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * ChangeResult constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function afterGetBaseUrl(
        \Magento\Framework\Url\ScopeInterface $subject,
        $baseUrl,
        $type = \Magento\Framework\UrlInterface::URL_TYPE_LINK,
        $secure = null
    ) {

        $status = $this->scopeConfig->getValue(
            'smimageoptimization/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if ($type == \Magento\Framework\UrlInterface::URL_TYPE_MEDIA && $status) {
            $baseUrl = $this->scopeConfig->getValue(
                'smimageoptimization/general/image_engine_url',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
            $baseUrl = $baseUrl . '/media/';
        }

        return $baseUrl;
    }
}
