# WordPress-ACF-Bootstrap-Custom-Slideshow

This file contains an Advanced Custom Fields loop to show a custom slideshow.

The code loop through ACF rows and outputs slides. The code also uses WordPress' built in is_mobile(); to look for a custom mobile image in ACF. If none is supplied, the code then uses a custom image size to render the mobile image.

If is desktop, the code will show the full slide image.

The code also includes Bootstrap 4 flex positioning to allow positioning of the caption box.
