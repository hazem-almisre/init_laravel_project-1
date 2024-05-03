<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowCompanyPostsUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;


class ShowCompanyPostsLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private ShowCompanyPostsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Post , []);


        $posts = $this->repository->readRepository()->getRecordsByValues("companyId"$this->input->getCompanyId();

        if (!$recommand) {
            $recommanded = $this->repository->createRepository()->create($condation);
            if($recommanded){
                $company = $recommanded->company;
                $company->recommendation++;
                $company->save();
                return $this->output->sendSuccess((new CompanyRecommendedOutput())->getOutputAsArray() , 'Success');
            }
            else{
                return $this->output->sendFailed(null,ErrorMessage::$followFiled);
            }
        }
        else
        {
            $company = $recommand->company;
            if($this->repository->deleteRepository()->delete($recommand->recommandId)){
                $company->recommendation--;
                $company->save();
            return $this->output->sendSuccess((new CompanyRecommendedOutput())->getOutputAsArray() , 'Success');
            }
            else{
            return $this->output->sendFailed(null,ErrorMessage::$unfollowFiled);
            }
        }


    }
}
