<?php
/**
 * ChangeResult.php
 *
 * @copyright Copyright © 2019 ScientiaMobile. All rights reserved.
 * @author    pasichnikroman@gmail.com
 */

namespace ScientiaMobile\IO\Model\Plugins;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\Response\Http as ResponseHttp;
use \Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class ChangeResult
 * @package ScientiaMobile\IO\Model\Plugins
 */
class ChangeResult
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
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if ($status) {
            $imageEngineUrl = $this->scopeConfig->getValue(
                'smimageoptimization/general/image_engine_url',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
            $imageEngineUrl .= "/media/";

            $response->setBody(
                preg_replace(
                    '/<\/head>/',
                    '<link rel="preconnect" href="' . $imageEngineUrl . '" crossorigin>' . '</head>',
                    $response->getBody(),
                    1
                )
            );
        }

        return $result;
    }
}
