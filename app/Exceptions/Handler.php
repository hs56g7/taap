<?php

namespace App\Exceptions;

use Mail;
use App\LERN;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    protected function whoopsHandler()
    {
        try {
            return app(\Whoops\Handler\HandlerInterface::class);
        } catch (\Illuminate\Contracts\Container\BindingResolutionException $e) {
            return parent::whoopsHandler();
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if(config('env.APP_ENV') == 'production')
        {
            $user_id = 0;
            $user_type = "";

            if(Auth::check())
            {
                $user_id = Auth::id();
                $user_type = "Road Delivery";
            }
            else if(Auth::guard('cafe_user')->check())
            {
                $user_id = Auth::guard('cafe_user')->id();
                $user_type = "Cafe User";
            }
            else if(Auth::guard('cafe_manager')->check())
            {
                $user_id = Auth::guard('cafe_manager')->id();
                $user_type = "Cafe Manager";
            }
            else if(Auth::guard('home_delivery_customer')->check())
            {
                $user_id = Auth::guard('home_delivery_customer')->id();
                $user_type = "Home Delivery";
            }
            
            $class          = get_class($exception);
            $file           = $exception->getFile();
            $code           = $exception->getCode();
            $message        = $exception->getMessage();
            $line           = $exception->getLine();
            $trace          = $exception->getTraceAsString();
            $data           = implode($request->all());
            $url            = $request->url();
            $method         = $request->method();

            /**
             * Skip logging and alerting for all 400-level errors
             */
            dd($exception, $this->isHttpException($exception));
            if($this->isHttpException($exception) == false)
            {
                LERN::insert([
                    'class'             => $class,
                    'file'              => $file,
                    'code'              => $code,
                    'line'              => $line,
                    'message'           => $message,
                    'trace'             => $trace,
                    'created_at'        => date("Y-m-d H:i:s"),
                    'user_id'           => $user_id,
                    'data'              => $data,
                    'url'               => $url,
                    'method'            => $method,
                ]);
                
                Mail::send('exceptions.default', ['exception' => $exception, 'user_id' => $user_id, 'user_type' => $user_type, 'method' => $method, 'url' => $url], function ($message)
                {
                    $message->to('hs56g7@gmail.com', 'TAAP Error');
                    $message->from('do_not_reply@taap2020.com', 'Error Warning');
                    $message->subject('Error Notice');
                });
            }

            if($this->isHttpException($exception))
            {
                switch (intval($exception->getStatusCode()))
                {
                    // not found, redirect to home
                    case 404:
                        return redirect('/');
                        break;
                    // method not allowed, redirect to home
                    case 405:
                        return redirect('/');
                        break;
                }
            }
            else
            {
                return parent::render($request, $exception);
            }
        }
        else
        {
            // for dev
            if($this->isHttpException($exception))
            {
                switch (intval($exception->getStatusCode()))
                {
                    // not found, redirect to home
                    case 404:
                        return redirect('/');
                        break;
                    // method not allowed, redirect to home
                    case 405:
                        return redirect('/');
                        break;
                }
            }

            return parent::render($request, $exception);
        }
    }
}
