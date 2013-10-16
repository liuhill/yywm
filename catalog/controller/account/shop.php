<?php 
class ControllerAccountShop extends Controller {  
	public function index() {
		if (!$this->customer->isLogged()) {
	  		$this->session->data['redirect'] = $this->url->link('account/shop', '', 'SSL');
	  
	  		$this->redirect($this->url->link('account/login', '', 'SSL'));
    	} 
		$this->language->load('account/shop');
    	
		$this->document->setTitle($this->language->get('heading_title'));
		
      	$this->data['breadcrumbs'] = array();
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),       	
        	'separator' => false
      	); 
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_account'),
			'href'      => $this->url->link('account/account', '', 'SSL'),
        	'separator' => $this->language->get('text_separator')
      	);
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_shop'),
			'href'      => $this->url->link('account/shop', '', 'SSL'),
        	'separator' => $this->language->get('text_separator')
      	);

		
		$this->data['button_continue'] = $this->language->get('button_continue');
		$this->data['button_back'] = $this->language->get('button_back');
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
    	$this->data['hello_shop'] = $this->language->get('hello_shop');	
		
		$this->data['back'] = $this->url->link('account/account', '', 'SSL');
		
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/shop.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/shop.tpl';
		} else {
			$this->template = 'default/template/account/shop.tpl';
		}

		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'	
		);
						
		$this->response->setOutput($this->render());			
  	}
}
?>