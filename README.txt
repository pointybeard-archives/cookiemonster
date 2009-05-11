Cookie Monster
------------------------------------

Version: 1.1
Author: Symphony Team (http://symphony21.com)
Build Date: 16th May 2008
Requirements: Symphony Beta revision 5 or greater.


[INSTALLATION]

1. upload this folder, 'cookiemonster', to your /extensions folder

2. (optional) If you want values added to the cookie via cookie monster to 
   show up in the page params, making them usable by DS's for filtering, you 
   will need to add the following code to line 157 of 
   '/symphony/lib/toolkit/class.frontendpage.php':

       $this->_Parent->ExtensionManager->notifyMembers('ManipulatePageParameters', '/frontend/', array('params' => &$this->_param));	

   It will replace the existing commented line starting with 'TODO'


3. navigate to 'System' > 'Extensions' and enable it

4. Add the "Cookie Monster: Add GET variable to cookie" Event 
   and/or "Cookie Monster: Show Cookie Parameters" Data Source to
   your page. Documentation on the Event can be viewed via the 
   Components area of the Symphony Admin.


[USAGE]

- The Event allows for adding GET variables to the XML. Setting a
  GET variable to an empty string will remove it from the cookie

- Remember that cookie changes wont take effect until the next page
  load, thus new parameters will not show up in the Data Source 
  (or page params if you made the appropriate change) right
  away, however they will be present in the Event XML to signify
  the change.

- If you made the delegate change in step 2 of installation, values 
  added to the cookie via cookie monster will show in the page params
  like so: '$cookiemonster-KEY = VALUE' where KEY and VALUE.
  