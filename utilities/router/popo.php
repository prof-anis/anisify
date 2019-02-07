$pass=[];
		$parameter=[];
		
		//var_dump(self::$route);
		foreach (self::$route as $key => $route) {
			$pattern=$route['pattern'];
			$patternArray=explode('/',$pattern);
			//var_dump($patternArray);
			//exit();
			
			foreach ($this->url as $key => $value) {
				$search=(isset($patternArray[$key])) ? $patternArray[$key] : null;
					
					if($value == $search)
					{
						$pass[]=true;
						
					}
					elseif (strpos($search,':') > -1) {

						$parameter['anis_'.count($this->parameter)]=$value;


					}
					else
					{
						$pass[]=false;
					}

		}

			if(!in_array(false, $pass))
					{	$this->parameter=$parameter;
						$this->routeToUse=$route;
						break;
					}
					else{
						$parameter=null;
					}

					
					


	}	//var_dump($this->routeToUse);
		//var_dump($this->parameter);