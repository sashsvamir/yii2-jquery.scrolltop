# Yii2 jquery.scrollTop button


## Installation

`composer require sashsvamir/yii2-jquery.scrolltop:"dev-master"`



## Description

Scroll to top button (jquery).



## Using

in view (usually main template):
```php
use sashsvamir\scrollTop;
scrollTop\ScrollTop::widget([
	'offset' => 1300,      // Scroll length offset (from top) when button appear
	'nativeStyle' => true, // Whether using native botton's styles or user css
]);
```
