<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Services\ApiService;


class Consult extends Model
{
	private $apiService;
	private $specialistsList;
	private $professionalList;


    protected $fillable = [
        'name',
        'specialty_id',
        'professional_id',
        'cpf',
        'source_id',
        'birthdate'
    ];

    public function __construct()
    {
        $this->apiService = \App::make('App\Services\ApiService');

    }

    public function setSpecialistsList(){
        $this->specialistsList = $this->apiService->getSpecialistsList();
        \Session::put("specialistsList",$this->specialistsList);
    }

    public function setProfessionalList($especialidade_id){
        $this->professionalList = $this->apiService->getProfessionalList($especialidade_id);
        \Session::put("especialidade_id",$especialidade_id);
        \Session::put("professionalList",$this->professionalList);
    }

    public function getSpecialtyById($especialidade_id){
    	if(isset($this->specialistsList)){
			if(isset($this->specialistsList->content)){
				$have_specialty = false;
				foreach ($this->specialistsList->content as $key => $specialty) {
					if(isset($specialty->especialidade_id)){
						if($specialty->especialidade_id == $especialidade_id){
							$have_specialty = true;
							return $specialty->nome;
						}
					}
				}
				if(!$have_specialty){
					return "failed";
				}
			}else{
				return "failed";
			}
		}else{
			return "failed";
		}
    }

    public function getProfessionalById($profissional_id){
    	if(isset($this->professionalList)){
			if(isset($this->professionalList->content)){
				$have_professional = false;
				foreach ($this->professionalList->content as $key => $professional) {
					if(isset($professional->profissional_id)){
						if($professional->profissional_id == $profissional_id){
							$have_professional = true;
							return $professional->nome;
						}
					}
				}
				if(!$have_professional){
					return "failed";
				}
			}else{
				return "failed";
			}
		}else{
			return "failed";
		}
    }

    

    protected function specialtyId(): Attribute
    {
    	if(!\Session::has("specialistsList")){
    		self::setSpecialistsList();
    	}else{
    		$this->specialistsList = \Session::get("specialistsList");
    	}
    	$specialty = self::getSpecialtyById($this->attributes['specialty_id']);
    	$return_value = $this->attributes['specialty_id'];
    	if($specialty != "failed"){
    		$return_value = $specialty;
    	}
        return Attribute::make(
            get: fn () => $return_value,
        );
    }

    protected function professionalId(): Attribute
    {
    	if(!\Session::has("professionalList") || !\Session::has("especialidade_id")){
    		self::setProfessionalList($this->attributes['specialty_id']);
    	}else{
    		if(\Session::get("especialidade_id") != $this->attributes['specialty_id']){
    			self::setProfessionalList($this->attributes['specialty_id']);
    		}else{
    			$this->professionalList = \Session::get("professionalList");
    		}
    	}
    	$professional = self::getProfessionalById($this->attributes['professional_id']);
    	$return_value = $this->attributes['professional_id'];
    	if($professional != "failed"){
    		$return_value = $professional;
    	}
        return Attribute::make(
            get: fn () => $return_value,
        );
    }

    
}
