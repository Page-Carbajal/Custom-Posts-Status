# WPExpress-UI

HTML Builder and Render Engine for WPExpress.
 

##Change Log


###TO DO

- Improve Documentation
- Create Formatting class a port of WordPress functions to sanitize titles and file names
- Custom Fields
    - Create FieldsCollection/registerCustomField($fieldName, CustomField $callback) method
        - $fieldName defines the name of the field, to be created
        - CustomField is an Abstract class forcing the object to implement methods like render and so on
        - Add CustomField class
        - Samples
            - http://omarello.com/2010/08/grails-custom-tags-diy/
            - http://twig.sensiolabs.org/doc/advanced.html

###Version 1.0.4 - FieldCollection and HTMLParser

- Implemented subset for HTMLParser/parseFields
- Added sanitize_title to ID and Name properties on FieldCollection
- Added extra getters and setters for FieldCollection


###Version 1.0.3 - Input fields bug fix

- Fixed missing value on input fields


###Version 1.0.2 - Single Render Event

- Added method BaseSettingsPage/actionHookIsValid to prevent double rendering
- Simplified the constructor to allow for convention over configuration 
- Added BaseSettingsPage/setTopParentMenu

###Version 1.0.1 - Damn bugs

- Added method FieldCollection/toArray
- Renamed the method BaseSettingsPage/getFieldValue to getOptionValue


###Version 1.0.0 - Release Candidate 1

- Finished small touches on HTMLFieldParser and FieldCollection
- Fixed HTMLFieldParser/textArea method
- Added support for custom field IDs on HTMLFieldParser/parseFields
- Fixed FieldsCollection newField/type error
- Simplified BaseSettings Page
- Fixed attribution error on FieldCollection setProperty and setAttribute
- Removed field methods from BaseSettingsPage
- Added method FieldCollection/parse
- Renamed Tags to HTMLFieldParser
- Added FieldCollection class
- Renamed UI to BaseResources 
- Dropped UI folder


###Version 0.5.4 

- Added warning for empty options to Tags/selectField
- RenderEngine/createDirectoryStructure triggers a warning instead of an error 

###Version 0.5.3

- Added radio button and text area HTML tags


###Version 0.5.2 - Updated dependencies, removed tests files

- Added vendor directory and composer.lock to gitignore
- Removed the vendor directory
- Updated twig version


###Version 0.5.1 - Fixed: Exception on renderMustacheTemplate

- Added exception for cache directory on renderTwigTemplate method
- Added warning if missing partials directory
- Added warning if missing cache directory
- Fixed createDirectoryStructure exception
- Adopted [Semantic Versioning](http://semver.org)


###Version 0.5

- Fixed errors on the RenderEngine class
- Made the RenderEngine class final
- Simplified the constructor
- Added two error throwing exceptions
- Added the RenderEngine/setTemplatePath method 
- Added the RenderEngine/createDirectoryStructure method
- Remove WordPress specific functions dependencies

###Version 0.4

- Last stable version