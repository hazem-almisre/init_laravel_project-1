<?php

namespace App\Exceptions;

use App\Adapters\Presenters\HttpPresenter\HttpPresenterResponse;
use App\Adapters\presenters\JsonResponsePresenter;
use App\presenter\JsonResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage(),'data'=>$th->getTrace()]);
        });
    }

    public function render($request, Throwable $th)
    {
        $excption = new CustomException($th);
        
        return (new JsonResponsePresenter )->sendFailed($excption->getData() ,
        $excption->getMessage() )->sendResult();
    }
}
