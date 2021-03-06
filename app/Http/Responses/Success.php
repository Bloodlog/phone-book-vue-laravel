<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

/**
 * Class Success
 * @package App\Http\Responses
 */
class Success implements Responsable
{
    /**
     * @var null
     */
    private $message;
    /**
     * @var int
     */
    private $status;

    /**
     * Success constructor.
     * @param null $message
     * @param int $status
     */
    public function __construct($message = null, $status = 200)
    {
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json([
            'success' => true,
            'data' => array_wrap($this->message)
        ])->setStatusCode($this->status);
    }
}
