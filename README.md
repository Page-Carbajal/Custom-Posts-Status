#Custom Post Status for WordPress

Once upon a time in a website far far away, there was a content administrator who wanted to be able to set different post status for his content.

Sadly, his WordPress installation only provided a function called **register_post_status** to register the status, but it did not work. 

So instead of being sadden by this fact, the content administrator asked a bold [software engineer](http://pagecarbajal.com) to fight for a just cause and give him the ability to set his own status.
 
This is the story of that journey. The journey that will conquer the **Custom Post Status** for WordPress.
 

##How does it work?

Well, it is quite simple. 

1. You set up the status you want in a Settings page
2. We register them with WordPress 
3. A sneaky JS function updates the **post submit metabox**


##Change Log

###Version 1.0.0 - Our First Custom Post Status

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