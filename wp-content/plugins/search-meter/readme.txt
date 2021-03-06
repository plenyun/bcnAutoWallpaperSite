=== Search Meter ===
Contributors: bennettmcelwee
Donate link: http://www.thunderguy.com/semicolon/wordpress/search-meter-wordpress-plugin/
Tags: search, meter, search-meter, statistics, widget, admin
Requires at least: 1.5
Tested up to: 2.8.4
Stable tag: 2.6

Search Meter tracks what your readers are searching for on your blog. View full details of recent searches or stats for the last day, week or month.

== Description ==

If you have a Search box on your blog, Search Meter automatically records what people are searching for -- and whether they are finding what they are looking for. Search Meter's admin interface shows you what people have been searching for in the last couple of days, and in the last week or month. It also shows you which searches have been unsuccessful. If people search your blog and get no results, they'll probably go elsewhere. With Search Meter, you'll be able to find out what people are searching for, and give them what they want by creating new posts on those topics.

You can also show your readers what the most popular searches are. The Popular Searches widget displays a configurable list of recent popular successful search terms on your blog, with each term hyperlinked to the actual search results. There's also a Recent Searches widget, which simply displays the most recent searches. If you are happy to edit your theme, both of these functions are also available as template tags.

Search Meter installs easily and requires no configuration. Just install it, activate it, and it starts tracking your visitors' searches.

= View Statistics =

To see your search statistics, Log in to WordPress Admin, go to the Dashboard section and click Search Meter. You'll see the most popular searches in the last day, week and month. Click "Last 100 Searches" or "Last 500 Searches" to see lists of all recent searches.

= Manage Statistics =

There are a couple of management option available if you go to the Settings section and click Search Meter. Use the Reset Statistics button to clear all past search statistics; Search Meter will immediately start gathering fresh statistics. If you're technically-minded, you might want to check the "Keep detailed information" checkbox to make Search Meter save technical information about every search (the information is taken from the HTTP headers).

== Installation ==

You can find, download and install Search Meter directly from the **Plugins** section in WordPress.

If you have an older version of WordPress, download and unzip the search-meter.zip file and upload to the `/wp-content/plugins/search-meter` directory. Then activate the plugin through the **Plugins** section in WordPress.

= Widgets: Popular and Recent Searches =

The Popular Searches widget displays a list of the most popular successful search terms on your blog during the last 30 days. The Recent Searches widget displays a simple list of the most recent successful search terms. In both cases, the search terms in the lists are hyperlinked to the actual search results; readers can click the search term to show the results for that search. You can configure the title of each widget, and the maximum number of searches that each widget will display.

To add these widgets to your sidebar, log in to WordPress Admin, go to the Appearance section and click Widgets. You can drag the appropriate widget to the sidebar of your choice, and set the title and the  number of searches to display.

= Template Tags =

If you are using an older version of WordPress or an old theme, you may not be able to use the widgets. In any case, you can always use the Search Meter template tags to display the same information. You'll need to edit your theme to use them.

The `sm_list_popular_searches()` template tag displays a list of the 5 most popular successful search terms on your blog during the last 30 days. Each term is a hyperlink; readers can click the search term to show the results for that search. Here are some examples of using this template tag.

`sm_list_popular_searches()`
Show a simple list of the 5 most popular recent successful search terms, hyperlinked to the actual search results.

`sm_list_popular_searches('<h2>Popular Searches</h2>')`
Show the list as above, with the heading "Popular Searches". If there have been no successful searches, then this tag displays no heading and no list.

`sm_list_popular_searches('<li><h2>Popular Searches</h2>', '</li>')`
Show the headed list as above; this form of the tag should be used in the default WordPress theme. Put it in the `sidebar.php` file.

`sm_list_popular_searches('<li><h2>Popular Searches</h2>', '</li>', 10)`
This is the same as the above, but it shows the 10 most popular searches.

`sm_list_recent_searches()`
Show a simple list of the 5 most recent successful search terms, hyperlinked to the actual search results. You can also use the same options as for the `sm_list_popular_searches` tag.

== Frequently Asked Questions ==

= Where can I find out more information? =

The [Search Meter home page](http://www.thunderguy.com/semicolon/wordpress/search-meter-wordpress-plugin/) has more information and a form to submit comments and questions.

== Screenshots ==

1. The Search Meter administration interface, showing some of the reports available.

== Changelog ==

= 2.6 =
* Use UTF8 when creating tables
* Fix PHP 5.3 incompatibility
* Widgets now conform to WordPress 2.8 standards

= 2.5 =
* Improve formatting on the Options page
* Fix database error caused by duplicate searches
* Users of Search Meter version 1 will need to deactivate and reactivate the plugin to use version 2.5.

= 2.4 =
* Fix the links to the Statistics and Options pages, which broke in WordPress 2.7.

= 2.3 =
* Improve widget display and add controls to specify the number of searches to show
* Add option to hide donation buttons

= 2.2 =
* Add widgets for Recent Searches and Popular Searches
* Fix table creation problem on WordPress 2.2.1
* Add donation buttons (thanks for your consideration)

= 2.1 =
* Improve search count accuracy

= 2.0 =
* Add Recent Searches page and template tag
* Make search counts more accurate: correctly count multi-page searches and searches with no referer [sic]
* Popular Searches tag allows number of results to be specified.

= 1.1 =
* Various improvements

= 1.0 =
* Initial public release
