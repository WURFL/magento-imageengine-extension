# ImageEngine extension for Magento 2

This extension can be installed via composer:

```
composer require scientiamobile/module-magento2-image-cdn-imageengine
```
The extension can then be enabled like this:

```
magento module:enable scientiamobile/module-magento2-image-cdn-imageengine
```

Follow the guide in the [official ImageEngine documentation]([https://imageengine.io/docs/integration-guides/imageengine-magento2-plugin/](https://support.imageengine.io/hc/en-us/articles/360059128332#h_01F6F5J0AFMN3KBX71A9G8TY9C)

# Change Log

### Version : V1.0.22
- **Fixed:** Update client hint headers issue [#13](https://github.com/WURFL/magento-imageengine-extension/issues/13)
- Issue solved for `img-src`,`script` and `style` are controlled with a content security policy.


### Version : V1.0.21
- Readme updates
- Compatible with **Magento 2.4.5**
- **Fixed:** Update client hint headers issue [#7](https://github.com/WURFL/magento-imageengine-extension/issues/7)
