<?php

namespace App\Providers;

use App\Repository\Repository;
use App\FactoryModel\FactoryModel;
use Illuminate\Support\ServiceProvider;
use App\BusinessLogic\Interfaces\FactoryInterface;
use App\Http\Controllers\Login\UserLoginController;
use App\BusinessLogic\Core\InternalInterface\Service;
use App\Repository\RepositoryDepartments\ReadDepartment;
use App\Repository\RepositoryDepartments\CreateDepartment;
use App\Repository\RepositoryDepartments\DeleteDepartment;
use App\Repository\RepositoryDepartments\UpdateDepartment;
use App\BusinessLogic\Services\LoginService\PublicLoginLogic;
use App\Repository\RepositoryDepartments\FunctionsDepartment;
use App\Adapters\Presenters\HttpPresenter\HttpPresenterResponse;
use App\BusinessLogic\Interfaces\HelperFunctionsInterface;
use App\BusinessLogic\Interfaces\Repository\RepositoryInterface;
use App\BusinessLogic\Interfaces\Repository\RepositoryDepartments\ReadDepartmentInterface;
use App\BusinessLogic\Interfaces\Repository\RepositoryDepartments\CreateDepartmentInterface;
use App\BusinessLogic\Interfaces\Repository\RepositoryDepartments\DeleteDepartmentInterface;
use App\BusinessLogic\Interfaces\Repository\RepositoryDepartments\UpdateDepartmentInterface;
use App\BusinessLogic\Interfaces\Repository\RepositoryDepartments\FunctionsDepartmentInterface;
use App\Helper\HelperFunctions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //-------------------------------------------
        $this->app->bind(
            FactoryInterface::class,
            FactoryModel::class
           );

        //--------------Repository

        
        $this->app->bind(
            RepositoryInterface::class,
            Repository::class
           );

           $this->app->bind(
            FunctionsDepartmentInterface::class,
            FunctionsDepartment::class
           );

           $this->app->bind(
            ReadDepartmentInterface::class,
            ReadDepartment::class
           );

           $this->app->bind(
            UpdateDepartmentInterface::class,
            UpdateDepartment::class
           );

           $this->app->bind(
            CreateDepartmentInterface::class,
            CreateDepartment::class
           );

           $this->app->bind(
            DeleteDepartmentInterface::class,
            DeleteDepartment::class
           );

           //------------------

           $this->app->bind(
            HelperFunctionsInterface::class,
            HelperFunctions::class
           );

           

        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
