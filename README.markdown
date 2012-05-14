# Cookie Monster

## Installation
1. Upload this folder, `cookiemonster`, to your extensions folder
2. Navigate to System > Extensions and enable it
3. Add the "Cookie Monster: Add GET variable to cookie" event to your page

## Usage
After attaching the event to a page, request it with a URL such as:

	/my-page/?colour=red&shape=square

This will store these two values into the Cookie Monster cookie. To unset cookie values, send an empty string:

	/my-page/?shape=

Remember that cookie changes won't take effect until the next page load, thus new parameters will not show up in the datasource (or page params) right away, however they will be present in the Event XML to signify the change.

Values added to the cookie via cookie monster will show in the page params like so:

	$cookiemonster-colour = red
	$cookiemonster-shape = square

And in the page XML as:

	<data>
		<params>
			...
			<cookiemonster-colour>red</cookiemonster-colour>
			<cookiemonster-shape>square</cookiemonster-shape>
		</params>
		...
	</data>