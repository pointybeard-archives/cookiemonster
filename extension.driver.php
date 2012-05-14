<?php

	Class extension_cookiemonster extends Extension{
		
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
			
			if(Symphony::Configuration()->get('display-in-page-param', 'cookiemonster') === 'no') return;
			
			$cookie = new Cookie(__SYM_COOKIE_PREFIX__ . '-cookiemonster', TWO_WEEKS, __SYM_COOKIE_PATH__);			
			if(!is_array($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster']) || empty($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'])) return;
				
			foreach($_COOKIE[__SYM_COOKIE_PREFIX__ . '-cookiemonster'] as $key => $val){
				if(strlen($val) <= 0) continue;				
				$context['params']['cookiemonster-' . $key] = $cookie->get($key);
	        }			
			
		}	
			
	}