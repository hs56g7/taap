<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class LERN extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    protected $table = 'lern_exceptions';

    public function getStatusCode(Exception $e) {
        if ($e instanceof HttpExceptionInterface) {
            return $e->getStatusCode();
        } else {
            return 0;
        }
    }

    public function getMethod() {
        $method = Request::method();
        if (!empty($method)) {
            return $method;
        } else {
            return null;
        }
    }

    public function getUrl() {
        $url = Request::url();
        if (is_string($url)) {
            return $url;
        } else {
            return null;
        }
    }

    public function getData() {
        $data = Request::all();
        if (is_array($data)) {
            return $this->excludeKeys($data);
        } else {
            return null;
        }
    }

    public function getIp() {
        return Request::ip();
    }
}
