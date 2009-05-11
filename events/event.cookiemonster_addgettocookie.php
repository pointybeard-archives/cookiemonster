<?php

	if(!defined('__IN_SYMPHONY__')) die('<h2>Error</h2><p>You cannot directly access this file</p>');

	Final Class eventCookiemonster_addgettocookie extends Event{

		public static function about(){
					
			return array(
						 'name' => 'Cookie Monster: Add GET variable to cookie',
						 'author' => array('name' => 'Alistair Kearney',
										   'website' => 'http://www.pointybeard.com',
										   'email' => 'alistair@pointybeard.com'),
						 'version' => '1.0',
						 'release-date' => '2008-04-29',						 
					);						 
		}
				
		public function load(){
			if(is_array($_GET) && !empty($_GET)) return $this->__trigger();
			return NULL;
		}

		public static function documentation(){
			
			return '
		
			<h3>Usage</h3>
			
			<p>Any GET parameters, i.e key & value pairs in the URL such as <code>?var1=hello</code>, will be added to the cookie, which is then available via the "Show Cookie Parameter" Data Source. XML after adding or removing variables look like so:</p>
			
			<pre class="XML"><code>&lt;cookie-monster>
	&lt;item name="var1" action="added">one&lt;/item>
	&lt;item name="var2" action="removed"/>
&lt;/cookie-monster></code></pre>
			
			<p>The corresponding URL for the above XML looks like <code>?var1=one&amp;var2=</code>. Notice that to remove an item, you set it as empty.</p>
			
			';

		}
		
		protected function __trigger(){
	
			$xml = new XMLElement('cookie-monster');
			
			$Cookie = new Cookie(__SYM_COOKIE_PREFIX__ . '-cookiemonster', TWO_WEEKS, __SYM_COOKIE_PATH__);
			
			$count = 0;
			
		    foreach($_GET as $key => $val){ 
		        if(!in_array($key, array('page', 'debug', 'profile'))){
					$Cookie->set($key, $val);
		        	$xml->appendChild(new XMLElement('item', $val, array('name' => $key, 'action' => (strlen($val) > 0 ? 'added' : 'removed'))));
		
					$count++;
		        }
		    }

		    return ($count == 0 ? NULL : $xml);
			
		}
	}

