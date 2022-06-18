<?php


	$view_namespace = 'App\Views';
	$view_folder = 'app/Views';
	$_t = [
		'layout' => 'login_register',
		'head' => 'head',
		'navbar' => 'login_register',
		'footer' => 'login_register',
		'javascript' => 'javascript',
		'sidebar' => 'login_register',
	];
	if(isset($v) && is_array($v)){
		$_t = array_replace_recursive($_t, $v);
	}

	/* layout */
	if (isset($_t['layout']) && file_exists(ROOTPATH.$view_folder.'/layout/'.$_t['layout'].'.php')){
		$this->extend($view_namespace.'\layout\\'.$_t['layout']);
	} else {
		echo '<pre>Layout <b>'.$_t['layout'].'</b> Not Found ! </pre>';
	} 
	/* head */
	$this->section('head');
	if (isset($_t['head']) && file_exists(ROOTPATH.$view_folder.'/head/'.$_t['head'].'.php')){
		echo $this->include($view_namespace.'\head\\'.$_t['head']);
	}
	$this->endSection(); 
	
	/* navbar */
	$this->section('navbar');
	if (isset($_t['navbar']) && file_exists(ROOTPATH.$view_folder.'/navbar/'.$_t['navbar'].'.php')){
		echo $this->include($view_namespace.'\\navbar\\'.$_t['navbar']);
	}
	$this->endSection(); 

	/* sidebar */
	$this->section('sidebar');
	if (isset($_t['sidebar']) && file_exists(ROOTPATH.$view_folder.'/sidebar/'.$_t['sidebar'].'.php')){
		echo $this->include($view_namespace.'\sidebar\\'.$_t['sidebar']);
	}
	$this->endSection(); 

	/* footer */
	$this->section('footer');
	if (isset($_t['footer']) && file_exists(ROOTPATH.$view_folder.'/footer/'.$_t['footer'].'.php')){
		echo $this->include($view_namespace.'\\footer\\'.$_t['footer']);
	}
	$this->endSection(); 

	/* javascript */
	$this->section('javascript');
	if (isset($_t['javascript']) && file_exists(ROOTPATH.$view_folder.'/javascript/'.$_t['javascript'].'.php')){
		echo $this->include($view_namespace.'\javascript\\'.$_t['javascript']);
	}
	$this->endSection(); 

	/* page */
	$this->section('page');
	if (isset($_t['page']) && file_exists(ROOTPATH.$view_folder.'/page/'.$_t['page'].'.php')){
		echo $this->include($view_namespace.'\page\\'.$_t['page']);
	}
	$this->endSection();
		
	/* script */
	$this->section('script');
	if (isset($_t['script']) && file_exists(ROOTPATH.$view_folder.'/script/'.$_t['script'].'.php')){
		echo $this->include($view_namespace.'\script\\'.$_t['script']);
	}
	$this->endSection();
?>


