<?php

use Illuminate\Http\Request;

if (!function_exists('call')) {

    /**
     * @param Request $request
     * @return object
     * @throws Exception
     */
    function call(Request $request): object
    {
        $request->headers->set('accept', 'application/json');

        $response = app()->handle($request);

        return (object) [
            'status_code' => $response->getStatusCode(),
            'status' => json_decode($response->getContent())->status,
            'message' => json_decode($response->getContent())->message ?? '',
            'data' => json_decode($response->getContent())->data ?? ''
        ];
    }
}
