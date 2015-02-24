<?php
class Traitify{
	public function create_assessment($deck_id = ""){
		$curl = curl_init();

		$url = $this->host . "/" . $this->version . "/assessments";

		curl_setopt($curl, CURLOPT_POST, 1);

	    $data = json_encode(Array("deck_id"=>$this->deck_id));


		if($data){
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		    'Accept: application/json',
		    'Content-Type: application/json'
	    ));

    	// Optional Authentication:
    	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    	curl_setopt($curl, CURLOPT_USERPWD, $this->private_key.":x");
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    	return json_decode(curl_exec($curl));
	}
}
