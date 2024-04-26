<?php
namespace App\BusinessLogic\UseCases\UserActor\RegisterUserUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class RegisterUserLogic implements UseCase
{


    public function __construct(
        //---------------------------------------------------------------------------------------
        private RegisterUserInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository,    // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output ,            // for present output to Views ---- Views
        private ServicesInterface $service               // frameWork services

){}

    // execute create entity service
    public function execute(): Result{



    $data = $this->input->toArray();

    if ( ! $this->service->DateServices()->verifyAge($this->input->getBirthDay() , 15) )
    return $this->output->sendFailed(null , ErrorMessage::$AgeIsNotAcceptable);

    $this->input->setPassword( $this->service->hashData($this->input->getPassword()));

    //Create Model
    $this->repository->buildRepositoryModel(EntityType::User , $data);

    //insert to dataBase
    $user = $this->repository->createRepository()->create($data);

    // if model is not created
    if($user == null) return $this->output->sendFailed(null, ErrorMessage::$errorOccurred);

    // $token = $this->service->getToken($user);

  // return response
    return $this->output->sendSuccess(
    (new RegisterUserOutput($user))->getOutputAsArray(),
            SuccessMessage::$registerSuccessfully
        );



    }


}
