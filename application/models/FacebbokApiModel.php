<?php 
class FacebbokApiModel extends CI_Model {
    
    public function getFacebookData($url)
    {
        if ($this->facebook->is_authenticated())
		{
			$datas = $this->facebook->request('get', $url);
			if (isset($datas['error']))
			{
				$datas = "";
            }
            
            if(isset($datas["paging"]["next"])){
                $nextUrl = $datas["paging"]["next"]; 
                while($nextUrl != ""){
                    $nextData = json_decode(file_get_contents($nextUrl), true);
                    $datas["data"] = array_merge($datas["data"], $nextData["data"]);
                    
                    if(isset($nextData["paging"]["next"])){
                        $nextUrl = $nextData["paging"]["next"]; 
                    } else {
                        $nextUrl = "";
                    }
                }
            }
                 
            return $datas;
		} else {
            return "";
        }
    }
}
?>