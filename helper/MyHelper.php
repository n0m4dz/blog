<?php

namespace Helper;

class MyHelper{

	function myStrReplace($str = ''){
		if(empty($str)){
			return 'garchig baihgui';
		}else{
			return str_replace(' ', '-', $str);
		}
	}

}