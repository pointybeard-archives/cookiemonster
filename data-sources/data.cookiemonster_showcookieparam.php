<?php	
		
	Final Class datasourceCookiemonster_showcookieparam Extends DataSource{			

		function about(){
			return array(
					 'name' => 'Cookie Monster: Show Cookie Parameters',
					 'author' => array(
							'name' => 'Symphonists (Symphony Community)',
							'website' => 'http://symphony-cms.com',
							'email' => 'team@symphony-cms.com'),
					 'version' => '1.0',
					 'release-date' => '2008-04-29');	
		}

		
		public function grab(){
			
			$xml = new XMLElement('cookie-monster');
					
			$Cookie = new Cookie(__SYM_COOKIE_PREFIX__ . '-cookiemonster', TWO_WEEKS, __SYM_COOKIE_PATH__);			
			
			if(!is_array($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster']) || empty($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'])) return NULL;
				
			foreach($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'] as $key => $val){
				if(strlen($val) <= 0) continue;
				
				$xml->appendChild(new XMLElement('item', $Cookie->get($key), array('name' => $key)));
				$count++;
	        }
	    
			return $xml;
				
		}		
		
	}

?>
