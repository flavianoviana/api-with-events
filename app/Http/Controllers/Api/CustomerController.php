<?php

namespace App\Http\Controllers\Api;

use App\Events\CustomerStoreEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    /**
     * @param CustomerStoreRequest $request
     * @return JsonResponse
     */
    public function store(CustomerStoreRequest $request): JsonResponse
    {
        try {
            CustomerStoreEvent::dispatch($request->all());

            $response = [
                'message' => 'Request Received'
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch( \Exception $e) {
            $response = [
                'message' => 'Failed to receive a request'
            ];

            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
