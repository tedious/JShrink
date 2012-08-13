JShrink is a php class that minifies javascript so that it can be delivered to the client quicker. This code can be used by any product looking to minify their javascript on the fly (although caching the results is suggested for performance reasons). Unlike many other products this is not a port into php but a native application, resulting in better performance.

### Usage

Minifying your code is simple call to a static function-

````
<?php
// Basic (default) usage.
$minifiedCode = JShrink\Minifier::minify($js);

// Disable YUI style comment preservation.
$minifiedCode = JShrink\Minifier::minify($js, array('flaggedComments' => false));
````

### Results

* Raw - 586,990
* Gzip - 151,301
* JShrink - 371,982
* JShrink and Gzip - 93,507
