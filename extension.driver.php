<?php

	Class extension_cookiemonster extends Extension{
	
		public function about(){
			return array('name' => 'Cookie Monster',
						 'version' => '1.1',
						 'release-date' => '2008-05-16',
						 'author' => array('name' => 'Symphony Team',
										   'website' => 'http://www.symphony21.com',
										   'email' => 'team@symphony21.com')
				 		);
		}
		
		public function getSubscribedDelegates(){
			return array(
						array(
							'page' => '/frontend/',
							'delegate' => 'ManipulatePageParameters',
							'callback' => 'addCookieValuesToPageParam'
						),						
			);
		}	
		
		public function addCookieValuesToPageParam($context){
			
			if($this->_Parent->Configuration->get('display-in-page-param', 'cookiemonster') == 'no') return;
			
			$Cookie = new Cookie(__SYM_COOKIE_PREFIX__ . '-cookiemonster', TWO_WEEKS, __SYM_COOKIE_PATH__);			
			
			if(!is_array($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster']) || empty($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'])) return;
				
			foreach($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'] as $key => $val){
				if(strlen($val) <= 0) continue;
				
				$context['params']['cookiemonster-' . $key] = $Cookie->get($key);
				$count++;
	        }			
			
		}	
			
	}

