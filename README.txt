Cookie Monster
------------------------------------

[INSTALLATION]

1. upload this folder, 'cookiemonster', to your /extensions folder

2. navigate to 'System' > 'Extensions' and enable it

3. Add the "Cookie Monster: Add GET variable to cookie" Event 
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

- Values added to the cookie via cookie monster will show in the page
  params like so: '$cookiemonster-KEY = VALUE' where KEY and VALUE.
  