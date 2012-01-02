<?php

	Class extension_cookiemonster extends Extension{
	
		public function about(){
			return array('name' => 'Cookie Monster',
						 'version' => '1.1',
						 'release-date' => '2008-05-16',
						 'author' => array('name' => 'Symphonists (Symphony Community)',
										   'website' => 'http://www.symphony-cms.com',
										   'email' => 'team@symphony-cms.com')
				 		);
		}
		
		public function getSubscribedDelegates(){
			return array(
						array(
							'page' => '/frontend/',
							'delegate' => 'FrontendParamsResolve',
							'callback' => 'addCookieValuesToPageParam'
						),						
			);
		}	
		
		public function addCookieValuesToPageParam($context){
			
			if(Symphony::Configuration()->get('display-in-page-param', 'cookiemonster') == 'no') return;
			
			$Cookie = new Cookie(__SYM_COOKIE_PREFIX__ . '-cookiemonster', TWO_WEEKS, __SYM_COOKIE_PATH__);			
			
			if(!is_array($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster']) || empty($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'])) return;
				
			foreach($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'] as $key => $val){
				if(strlen($val) <= 0) continue;
				
				$context['params']['cookiemonster-' . $key] = $Cookie->get($key);
				$count++;
	        }			
			
		}	
			
	}

