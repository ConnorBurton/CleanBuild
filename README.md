

# CleanBuild
A clean WordPress boilerplate to make creating custom sites quicker & easier.

__Table of contents__
- [Required Plugins](#required-plugins)
- [Included 3rd Party Libraries](#included-3rd-party-libraries)
- [Company Detail Shortcodes](#company-detail-shortcodes)

### Required Plugins
ACF is required to enable the custom shortcodes/options that the skeleton html includes.
 * Advanced Custom Fields Pro


### Included 3rd Party Libraries
Theses libraries are enqueued in ``` functions/wordpress/site-enqueue.php ``` but are commented out by default.

 * Slick.js
 * Backstretch
 * Fancybox
 * FontAwesome  4 (_Requires a CDN ID_)


## Company Detail Shortcodes
These are all of the shortcodes & their options that are generated using the __Company Details__ tab in the backend of WordPress.

__Shortcodes__
- [Company Address](#company-address)
- [Company Email Address](#company-email-address)
- [Company Phone Number](#company-phone-number)
- [Company Social Links](#company-social-links)
- [Company Name](#company-name)
- [Company Fax Number](#company-fax-number)
- [Company Registration Number](#company-registration-number)
- [Company Opening Hours](#company-opening-hours)

### Company Address
Returns the __Company Address__ field. It returns each row in to a separate ```li``` tag.
```php
<?php echo do_shortcode('[address]'); ?>
```

Option | Type | Default | Description
--- | --- | --- | ---
row | int | 1 | Selects which repeater row phone number will be returned
include-name | boolean | false | Will return the company name as the first ``` li ```
container | boolean | true | Will wrap the returned list items in a ```ul``` with the class of ```address-list```

### Company Email Address
Returns the __Company Email Address__ field in plaintext.
```php
<?php echo do_shortcode('[email]'); ?>
```

Option | Type | Default | Description
--- | --- | --- | ---
row | int | 1 | Selects which repeater row of the __Email Address__ field will be returned
link | boolean | false | Will return the email address with _mailto:_ before the email and a _?subject_ after
quick-link | boolean | false | Will return the email address automatically wrapped in an ```a``` tag

### Company Phone Number
Returns the __Company Phone Number__ field in plaintext.
```php
<?php echo do_shortcode('[phone]'); ?>
```

Option | Type | Default | Description
--- | --- | --- | ---
row | int | 1 | Selects which repeater row of the __Phone Number__ field will be returned
link | boolean | false | Will return the phone number with _tel:_ before the number
quick-link | boolean | false | Will return the phone number automatically wrapped in an ```a``` tag

### Company Social Links
Returns the __Company Social Links__ field. It returns each row in to a separate ```a``` tag.
```php
<?php echo do_shortcode('[social]'); ?>
```

Option | Type | Default | Description
--- | --- | --- | ---
container | boolean | true | Will wrap the returned social links in a ```div``` with the class of ```social-links```

### Company Name
Returns the __Company Name__ field in plaintext.
```php
<?php echo do_shortcode('[company-name]'); ?>
```

### Company Fax Number
Returns the __Company Fax Number__ field in plaintext.
```php
<?php echo do_shortcode('[fax]'); ?>
```

### Company Registration Number
Returns the __Company Reg Number__ field in plaintext.
```php
<?php echo do_shortcode('[reg-number]'); ?>
```

### Company Opening Hours
Returns each __Company Opening Hours__ row in to a ```p``` tag.
```php
<?php echo do_shortcode('[opening-hours]'); ?>
```

Option | Type | Default | Description
--- | --- | --- | ---
container | boolean | false | Will wrap the returned opening times in a ```div``` with the class of ```opening-hours```
single-line | boolean | false | Will return all rows in to a single ```p``` tag with a space on the end of each row
