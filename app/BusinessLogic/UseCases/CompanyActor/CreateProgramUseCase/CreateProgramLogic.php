<?php

namespace App\BusinessLogic\UseCases\CompanyActor\CreateProgramUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class CreateProgramLogic implements UseCase {

    

    
    public function __construct(
      //---------------------------------------------------------------------------------------
      private CreateProgramInput $input,  /*| Pass Request To Service*/
      //---------------------------------------------------------------------------------------
      private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork 
      private PresenterInterface $output,             // for present output to Views ---- Views
      private ServicesInterface $service              // frameWork services
   ){}
  
   
  public function execute() : Result {
    
    // check if end date greater than or equals start date?
    if(!$this->service->DateServices()->dateGreaterThanOrEquals($this->input->getStartDate() , $this->input->getEndDate() ))
    return $this->output->sendFailed(null , '');
 
    // calculate count of day between start and end date
    $days = $this->service->DateServices()->getDaysBetween($this->input->getStartDate() , $this->input->getEndDate());

    $this->service->SqlServices()->startTransaction(); // begin Transaction

    $program = 
    [
        'start' => $this->input->getStartDate(),
        'end'   => $this->input->getEndDate(),
        // 'form'  => $this->input->
    ];
    
    $x = $this->input->toArray(); 

    // for every day in program
    for($i= 1 ; $i <= $days ; $i++)
    {
               
        
    }
    
    //    return $this->output->sendSuccess($data , 'message'); 

    }
  
          

  
  }
  
  