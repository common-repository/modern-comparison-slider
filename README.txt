=== Modern Comparison Slider ===
Contributors: kylewetton
Tags: before, after, slider, comparison, compare, grading, modern
Requires at least: 3.0.1
Tested up to: 5.4.2
Requires PHP: 5.6
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A modern, easy-to-use comparison slider. Compare before and after images, for grading, CGI and other retouching comparisons.

== Description ==

A modern, easy-to-use comparison slider. Compare before and after images, for grading, CGI and other retouching comparisons. Easily convert two images into a comparison slider to show your work, whether it's photo grading, CGI, or any other kind of retouching.

Using an intuitive tag that wraps two images, there is no other work that needs to be done to get your comparison sliders working.

* Two modern theme options
* Great customization including start on hover, and starting point
* Mobile friendly
* Lightweight
* Easy-to-use!

All example photos by Dane Wetton.

== Installation ==

You can search Modern Comparsion Slider right in your WordPress plugins section, alternatively you can download and install the plugin:

1. Upload `modern-comparison-slider` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Wrap two images of the same size with the [compare] tag

== Frequently Asked Questions ==

= How do I use this plugin? =

Place two images of the same size one after another in the editor (tip: If you're using the new editor, make sure your block that holds these two images is set to 'Classic')

Wrap these two images with the [compare] [/compare] tag. That's all it needs to get working!

= How can I style the look and feel?  =

There is a settings page found at Settings > Modern Compare Slider that will affect all sliders on the website. However, you can override a look and feel of any particular slider by using these options:

To disable the drop shadow on the controls

`[compare shadow="false"]`

To change the color of the controls

`[compare color="#4299e1"]`

To change the theme

`[compare theme="standard"]`
`[compare theme="circle"]`

To change the starting point, where the value is the percentage to show the before image initially.

`[compare startingpoint="75"]`

To start the slider on hover

`[compare hoverstart="true"]`

To disable smoothing

`[compare smoothing="false"]`

To adjust the smoothing amount, where the higher the value, the more dampening you feel

`[compare smoothingamount="250"]`

_You can add multiple options to a slider like so_

`[compare smoothing="false" color="#4299e1" theme="circle"]`

== Screenshots ==

1. Theme: Standard
2. Theme: Circle
3. An example of using the tags
4. An example of using the tag options
5. Global settings for all sliders

== Changelog ==

= 1.1.0 =
* Better mobile support (disables scrolling on interaction)
* Interaction persists when user leaves the scroller while mouse is down

= 1.0.2 =
* Accounts for WordPress automatically nesting images inside paragraph elements

= 1.0 =
* Initial version, stable and ready to go!