<?php
/**
 * @copyright Copyright © 2019 ScientiaMobile. All rights reserved.
 * @author    pasichnikroman@gmail.com
 */

namespace ScientiaMobile\IO\Model\Plugins\Framework\Controller;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Response\Http as ResponseHttp;
use Magento\Framework\Controller\ResultInterface;
use Magento\Store\Model\ScopeInterface;

class Result
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Result constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Perform result postprocessing
     *
     * @param ResultInterface $subject
     * @param ResultInterface $result
     * @param ResponseHttp $response
     * @return ResultInterface
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterRenderResult(ResultInterface $subject, ResultInterface $result, ResponseHttp $response)
    {
        $status = $this->scopeConfig->getValue(
            'smimageoptimization/general/enable',
            ScopeInterface::SCOPE_STORE
        );

        if ($status) {
            $imageEngineUrl = $this->scopeConfig->getValue(
                'smimageoptimization/general/image_engine_url',
                ScopeInterface::SCOPE_STORE
            );

            $response->setHeader('Accept-CH', 'sec-ch-dpr, sec-ch-width, sec-ch-viewport-width');
            $response->setHeader('Permissions-Policy', "ch-dpr=(\"{$imageEngineUrl}\"), ch-width=(\"{$imageEngineUrl}\"), ch-viewport-width=(\"{$imageEngineUrl}\")");
            $response->setHeader('link', "<{$imageEngineUrl}>; rel=preconnect");
            $response->setHeader('access-control-allow-headers', 'Origin, X-Requested-With, Content-Type, Accept');
        }

        return $result;
    }
}
