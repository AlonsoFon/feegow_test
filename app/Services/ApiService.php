<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class ApiService {



	public function getToken()
	{
		$feegow_api_token = config('services.api.feegow.key');
		return $feegow_api_token;
	}

	public function getApiDataset($token,$data_set,$parameters)
	{
		$response = Http::acceptJson()
		->withHeaders([
		    'x-access-token' => $token,
		])
		->get('https://api.feegow.com/v1/api'.$data_set,$parameters);
		$result = $response->object();
		if(!$response->successful() || !isset($result)) {
			return [];
		}
		return $result;
	}

	public function getSpecialistsList()
	{
		$access_token = self::getToken();
		$result = self::getApiDataset($access_token,"/specialties/list",[]);

		return $result;
	}

	public function getProfessionalList($especialidade_id)
	{
		$access_token = self::getToken();
		$parameters = [
    		'ativo' => true,
    		'especialidade_id' => $especialidade_id,
		];
		$result = self::getApiDataset($access_token,"/professional/list",$parameters);

		return $result;
	}

	public function getSourceList()
	{
		$access_token = self::getToken();
		$result = self::getApiDataset($access_token,"/patient/list-sources",[]);

		return $result;
	}

}
