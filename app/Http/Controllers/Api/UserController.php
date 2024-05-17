<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        try {
            $userToken = User::createApiUser($request->all());

            if($userToken) {
                $response = [
                    'message' => 'User created',
                    'token' => $userToken,
                ];

                $responseHttpCode = Response::HTTP_OK;
            } else {
                $response = [
                    'message' => 'Failed to create user',
                    'token' => null,
                ];

                $responseHttpCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            }

            return response()->json($response, $responseHttpCode);
        } catch( \Exception $e) {
            $response = [
                'message' => 'Failed to create user'
            ];

            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
