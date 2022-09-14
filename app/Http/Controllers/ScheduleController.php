<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

use App\Models\Consult;


class ScheduleController extends Controller
{
	private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function schedule(Request $request)
    {
        $specialties_list_result = $this->apiService->getSpecialistsList();
    	$source_list_result = $this->apiService->getSourceList();
        $specialties_list = [];
    	$source_list = [];
    	if(isset($specialties_list_result->content)){
    		$specialties_list = $specialties_list_result->content;
    	}
        if(isset($source_list_result->content)){
            $source_list = $source_list_result->content;
        }
    	return view("schedule")
                ->with("specialties_list",$specialties_list)
    			->with("source_list",$source_list);
    }

    public function professionalList(Request $request){
    	if(!$request->has("especialidade_id")){
    		return "failed";
    	}
    	$professional_list_result = $this->apiService->getProfessionalList($request->especialidade_id);
    	$professional_list = [];
    	if(isset($professional_list_result->content)){
    		$professional_list = $professional_list_result->content;
    	}
    	return $professional_list;
    }

    public function scheduleSave(Request $request){
        $Consult = Consult::create([
            'name' => $request->name,
            'specialty_id' => $request->specialty_id,
            'professional_id' => $request->profissional_id,
            'cpf' => $request->cpf,
            'source_id' => $request->source_id,
            'birthdate' => $request->birth_date 
        ]);
        if(isset($Consult)){
            return "success";
        }else{
            return "failed";
        }
    }
    
}
