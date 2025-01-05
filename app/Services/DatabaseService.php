<?php

namespace App\Services;


use App\Constants\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;

class DatabaseService
{
    protected $maxRetries = 3;
    protected $retryDelay = 1; // Delay in seconds

    public function runTransaction(callable $callback)
    {
        $retryCount = 0;

        while ($retryCount < $this->maxRetries) {
            try {
                return DB::transaction(function () use ($callback) {
                    return $callback();
                });
            } catch (QueryException $e) {
                if ($this->isDeadlock($e)) {
                    $retryCount++;
                    if ($retryCount >= $this->maxRetries) {
                        throw $e;
                    }
                    sleep($this->retryDelay);
                } else {
                    throw $e;
                }
            }
        }
    }

    protected function isDeadlock(Exception $e)
    {
        return $e->getCode() == '40001'; // SQLSTATE code for deadlock
    }
}
