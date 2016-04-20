#Custom Post Status

##Once upon a time

Once upon a time in a website far far away, there was a content administrator who wanted to be able to set different post status for his content.

While his WordPress installation provided a function called **register_post_status** to help him with this task, the **meta-boxes** function **post_submit_meta_box** was not in a very cooperative mood.  

So instead of being sadden by this fact, the content administrator asked a bold [software engineer](http://pagecarbajal.com) to help him fight for a just cause and give him the ability to set his own status list while keeping the peace in the kingdom.
 
This is the story of that journey. An adventure to conquer **Custom Post Status** for justice and peace.

##Fairy tale aside!

This project helps you implement your own Custom Status in the **Post Submit Box**.

To do this without disrupting the core and to make it easy to replace in the future, I decided to implement the path of least resistance.

###This is how it works
 
1. Create a Comma Separated Value list in the **Custom Status Settings** page
2. Every valid element will be the registered as a status using the function **register_post_status** 
3. Then, a sneaky JS function updates the **post submit metabox** to list all the status
4. Stick a fork in it, because it's done!

##Requirements

1. PHP 5.3 or higher

##About

This is an open source project under the GPL license commissioned by **Octopus** [Marketing Digital](http://octopus.mx) in sunny Cancun, Mexico. 

This project is coded and maintained by **Page Carbajal**, a [Software Engineer](http://pagecarbajal.com) who loves **WordPress** very dearly and is the father figure of **WPExpress**, A [WordPress Framework for Developers](http://pagecarbajal.com//wordpress-framework)

#Change Log

##Version 1.1.0 - Release Candidate 1
 
- Tested with WordPress 4.5
- All posts are non public 

##Version 1.0.2 - Fixed Noop Translation Error

- Fixed Noop Translation Error

##Version 1.0.1 - WPExpress upgrade

- Upgraded to WPExpress 1.3.0

##Version 1.0.0 - Our First Custom Post Status

- Enhanced JS to set the current post status 
- Implemented Custom Status List
- Implemented Settings Page
- Added dependencies to the repository
- Added settings page
- Finished Javascript implementation
- Added basic methods to customize JS
- Configured the plugin to work only for posts and only on edit and add screens
- Added language files, style and script files
- Added basic files