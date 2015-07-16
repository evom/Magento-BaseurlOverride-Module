
Magento BaseurlOverride Module
==============================

[www.evolvingmedia.net](http://www.evolvingmedia.net/)

  
  This module allows a developer to use a local Magento install against a remote database which is configured to 
  use a diffrent `baseurl` than the local setup. Since `baseurl` and `secureurl` are values stored in Magento's 
  database, it's not possible to use a local URL different than that stored in the DB. Until now...
  

Installation
------------

  Use [modman](https://github.com/colinmollenhour/modman) or manually copy the files into your Magento installation.
  

Configuration
-------------

  Add the following section to your `app/etc/local.xml` file, inside the `<global/>` section.
  (editing the URL to match your local development url):


    <dev_url>
      <url>http://127.0.0.1:8080/</url>
    </dev_url>


  See `local.xml.sample` for example in context.



Version History
---------------

  - 0.0.2 - Initial release.