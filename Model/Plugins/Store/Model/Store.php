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

class Store
{

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Store constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
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
                $baseUrl,
                $type = UrlInterface::URL_TYPE_LINK,
                $secure = null
    ) {
        $status = $this->scopeConfig->getValue(
            'smimageoptimization/general/enable',
            ScopeInterface::SCOPE_STORE
        );

        if ($type == UrlInterface::URL_TYPE_MEDIA && $status) {
            $baseUrl = $this->scopeConfig->getValue(
                'smimageoptimization/general/image_engine_url',
                ScopeInterface::SCOPE_STORE
            );
            $mediaPath = $this->scopeConfig->getValue(
                'smimageoptimization/general/media_path',
                ScopeInterface::SCOPE_STORE
            );
            $baseUrl = $baseUrl . $mediaPath;
        }

        return $baseUrl;
    }
}
