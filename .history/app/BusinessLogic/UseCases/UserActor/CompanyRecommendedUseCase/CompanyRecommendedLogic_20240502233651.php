<?php
namespace App\BusinessLogic\UseCases\UserActor\CompanyRecommendedUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;


class CompanyRecommendedLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private CompanyRecommendedInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Recommand , []);


        $condation = ["userId" => $this->input->getUserId() , "companyId" => $this->input->getCompanyId()];

        $follow = $this->repository->readRepository()->getModelByWhere($condation);

        if (!$follow) {
            return ($this->repository->createRepository()->create($condation))?
            $this->output->sendSuccess((new CompanyRecommendedOutput())->getOutputAsArray() , 'Success')
            :$this->output->sendFailed(null,ErrorMessage::$followFiled);
            ;
        }
        else
        {
            return ($this->repository->deleteRepository()->delete($follow->followId))?
            $this->output->sendSuccess((new CompanyRecommendedOutput())->getOutputAsArray() , 'Success')
            :$this->output->sendFailed(null,ErrorMessage::$unfollowFiled);
        }


    }
}
