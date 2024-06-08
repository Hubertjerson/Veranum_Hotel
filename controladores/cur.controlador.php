<?php


class CurlController{

/*=============================================
	Peticiones a la API de MERCADO PAGO
	=============================================*/	

	static public function mercadoPago($url, $method, $fields){

		$endpoint = "https://api.mercadopago.com/"; //TEST Y LIVE
		$accessToken = "TEST-3414316863855955-052820-a7d4d07015e0e774f0a0fd261ffe4056-1354879512"; //TEST

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $endpoint.$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => $method,
		  CURLOPT_POSTFIELDS => $fields,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json',
		    'Authorization: Bearer '.$accessToken
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$response = json_decode($response);
		return $response;

	}
}