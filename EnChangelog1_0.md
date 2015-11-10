<a href='Hidden comment: revision: 1'></a>

## Version 1.0 - _9 October 2009_ ##

First release include ORM implementation, logging, stable project structure, sample applications.

### 1.0 final release - _9 October 2009_ ###

  * improve method `find()` for "one" row: return null if row not exists
  * fix error in method `find()` for "one" row (if row not exists)
  * fix bug with method `create()` in [Days\_Db\_Rowset](EnLibDaysDbRowset.md) and [Days\_Db\_Table](EnLibDaysDbTable.md)
  * bring to a working state of php-templates **(xaoc)**
  * even small editing the blog-example **(xaoc)**
  * presented in the working condition the blog-example **(xaoc)**

### 1.0 release candidate 2 - _7 October 2009_ ###

  * improve `profile()` method in [Days\_Log](EnLibDaysLog.md) class _(send message only if firephp logging enabled)_
  * fix bug with incorrect definition controller/action with empty base path
  * fix incorrect replace pathes with empty base path
  * fix show warning on servers without default timezone

### 1.0 release candidate - _6 October 2009_ ###

  * add profiling into [Days\_Db\_Table](EnLibDaysDbTable.md) class
  * add `child` and `parent` magic fields into [Days\_Db\_Row](EnLibDaysDbRow.md)
  * add `profile()` method into [Days\_Log](EnLibDaysLog.md)
  * update Spyc yaml parser to version 0.4.5
  * change applications into "apps" directory (add directories "app" and "public")
  * add smarty plugin `helper` for call helpers into templates
  * add support of base path (for work site in directory)
  * reworked and presented in the working condition the blog-example **(xaoc)**
  * add method `_quote` in [Days\_Db\_Table](EnLibDaysDbTable.md) for quote identifiers
  * quote column names and table names in join statements (method `find()` in [Days\_Db\_Table](EnLibDaysDbTable.md))
  * add prefix to model classes. _Change this into you projects_
  * separetely handle `PostAction` before execute specified action
  * reworked and presented in the working condition the blog-example **(xaoc)**
  * fix bug with connection View in ORM (link MxN), added shielding behalf View **(xaoc)**
  * change application examples (fix bugs)
  * fix bug in [DaysEngine](EnLibDaysEngine.md) for loading file in `CamelCase`
  * fix bug in use native php templates by default
  * add new template engine - Dwoo
  * code cleanup and refactoring
  * fix bug in test compatibility with php 5.3
  * change project description to _"php:Days - flexible php5 framework"_

### 1.0 beta 3 - _21 September 2009_ ###

  * change method info() in [Days\_Db\_Table](EnlibDaysDbTable.md) for return "null" if column not exists
  * implement 1x1, 1xN, MxN relations in [Days\_Db\_Table](EnLibDaysDbTable.md) (need full tests)
  * change method info() in [Days\_Db\_Table](EnLibDaysDbTable.md) for return info about specified table
  * refactoring code into [DaysEngine](EnLibDaysEngine.md) class
  * [Days\_Log](EnLibDaysLog.md): added implementation of the method `logtoSqlite()` **(xaoc)**
  * slightly changed the format of the output `FirePhp` **(xaoc)**
  * improve Days\_Log: add error levels
  * fix bug in [DaysLog](EnLibDaysLog.md): add method `logtoSqlite` for sqlite logging
  * add comments into configuration files
  * add configuration parameter "log/level"
  * add "View/block" folder into applications for template blocks
  * refactoring of [Days\_Controller](EnLibDaysController.md), [Days\_Engine](EnLibDaysEngine.md): pass content template name on controller object creation
  * refactoring of [Days\_Controller](EnLibDaysController.md): change logic in "getContent" method - return content without layout
  * added method "toArray" for return all data as arrays in [Days\_Db\_Rowset](EnLibDaysDbRowset.md)
  * fix bug in [Days\_Db\_Table](EnLibDaysDbTable.md): replace creating object from Zend\_Db to inner in class
  * fix bug in [Days\_Db\_Row](EnLibDaysDbRow.md) for not existing columns catch exception
  * fix bug in [Days\_Db\_Row](EnLibDaysDbRow.md) in check table structure
  * improve [Days\_Db\_Row](EnLibDaysDbRow.md) to work with parent and itself table
  * add support `AjaxAction` and `PostAction` in controllers

### 1.0 beta 2 - _8 September 2009_ ###

  * fix bug in load configuration file

### 1.0 beta 1 - _4 September 2009_ ###

  * added ORM support as [Days\_Db\_Table](EnLibDaysDbTable.md) _(Active Record and Date Mapper patterns)_
  * added `apps/blog` directory for develop blog application
  * moved pld test application from `app` to `apps/new`
  * update Zend Framework library to version 1.9.2
  * fix bugs

### 1.0 alpha 5 - _17 August 2009_ ###

  * added new component [Days\_Db\_Table](EnLibDaysDbTable.md) (user for create models)
  * upgrade Zend Framework to version 1.9.1
  * fix bug in add prefix for model class name

### 1.0 alpha 4 - _10 August 2009_ ###

  * reduce release file size _(removed not used Zend Framework components)_

### 1.0 alpha 3 - _9 August 2009_ ###

  * [show error page](EnLibDaysLog.md) (404 - page not found; redirect; etc)
  * [ajax support](EnAjax.md) added
  * fix bug in Return part of URL address by parameter number

### 1.0 alpha 2 - _30th July 2009_ ###

  * you should now create a `app/Controller/Index.php` instead of the old `app/controller/IndexController.php` to change the structure of the project. See the [updated manual](EnMvc.md). These changes refer to [model](EnMvc.md) and [presentation](EnMvc.md)

### 1.0 alpha 1 - _23 July 2009_ ###

  * initial release