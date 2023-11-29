# ImageEngine extension for Magento 2

This extension can be installed via composer:

```
composer require scientiamobile/module-magento2-image-cdn-imageengine
```
The extension can then be enabled like this:

```
./bin/magento module:enable ScientiaMobile_IO
```

Follow the guide in the [official ImageEngine documentation](https://support.imageengine.io/hc/en-us/articles/360059128332#h_01F6F5J0AFMN3KBX71A9G8TY9C)

## Compatibility

Compatible with Magento Open Source and Adobe Commerce.

# Change Log

### Version : V1.0.26
- Compatible with **Magento Commerce** (tested with Magento Commerce 2.4.5-p1)
- Readme updates
  - Corrected module enable instruction - issue [#21](https://github.com/WURFL/magento-imageengine-extension/issues/21)
  - Add Compatibility section

### Version : V1.0.25
- Fix ACL resource definition

### Version : V1.0.24
- Updated PHP version constraint, added PHP 8.2 compatibility
- Compatible with **Magento 2.4.6-p1**

### Version : V1.0.23
- Fixed hardcoded media path.
- Added new config text field for dynamic media folder.
- Added validation for address URL.


### Version : V1.0.22
- **Fixed:** Update client hint headers issue [#13](https://github.com/WURFL/magento-imageengine-extension/issues/13)
- Issue solved for `img-src`,`script` and `style` are controlled with a content security policy.


### Version : V1.0.21
- Readme updates
- Compatible with **Magento 2.4.5**
- **Fixed:** Update client hint headers issue [#7](https://github.com/WURFL/magento-imageengine-extension/issues/7)
