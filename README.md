# ImageEngine Extension for Magento 2
The ImageEngine extesion for Magento 2 will automatically serve all images through the ImageEngine image optimization CDN.
## Prerequisites 
1. Magento 2 installed
2. ImageEngine account. Get one here: https://www.scientiamobile.com/page/imageengine
## Install
1. Download this repository as a zip: https://github.com/WURFL/Magento-ImageEngine-Extension/archive/master.zip
2. Unzip and place in the root folder of your Magento install
3. Run the command: `php bin/magento setup:upgrade`
4. Go to Store -> Configuration -> ImageEngine and input your token (ImageEngine hostname)
5. You may have to clear cache and set correct file permissons.
6. Confirm that your images are prefixed with `xxxx.imgeng.in` for exampel `xxxx.imgeng.in/http://server.com/image.jpg`
