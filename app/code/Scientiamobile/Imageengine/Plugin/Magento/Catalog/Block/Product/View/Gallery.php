<?php 
namespace Scientiamobile\Imageengine\Plugin\Magento\Catalog\Block\Product\View;

class Scientiamobile
{


    /*public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
    ) {
        $this->_scopeConfig = $scopeConfig;
    }*/
    public function afterGetGalleryImagesJson(
        \Magento\Catalog\Block\Product\View\Gallery $subject,
        $result
    ) {
        



        $om = \Magento\Framework\App\ObjectManager::getInstance();
        $registry = $om->get('Magento\Framework\Registry');
        $product = $registry->registry('product');  
        
        $id = $product->getId();

        
        $result1 = json_decode($result);
        
        
        
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $mediaPrefix = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('imageengine/general/token');


        if($mediaPrefix != null || $mediaPrefix != ""){
            $result_new = array();
            foreach ($result1 as $key => $value) {
                $result_new[$key]['thumb'] = 'http://'.$mediaPrefix.'.imgeng.in/'.$value->thumb;
                $result_new[$key]['img'] = 'http://'.$mediaPrefix.'.imgeng.in/'.$value->img;
                $result_new[$key]['full'] = 'http://'.$mediaPrefix.'.imgeng.in/'.$value->full;
                $result_new[$key]['caption'] = $value->caption;
                $result_new[$key]['position'] = $value->position;
                $result_new[$key]['isMain'] = $value->isMain;
            }
        }
        else{
            $result_new = array();
            foreach ($result1 as $key => $value) {
                $result_new[$key]['thumb'] = $value->thumb;
                $result_new[$key]['img'] = $value->img;
                $result_new[$key]['full'] = $value->full;
                $result_new[$key]['caption'] = $value->caption;
                $result_new[$key]['position'] = $value->position;
                $result_new[$key]['isMain'] = $value->isMain;
            }

        }


        

        






        $result_obj = array();
        foreach ($result_new as $key => $value) {
            $result_obj[$key] = (object)$value;
        }
        
       


        
        return json_encode($result_obj);
    }
}