<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FetchUsersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function __invoke(Request $request, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->validateCredentials($request->email, $request->password);

        return match ($user) {
          null => response()->error("Invalid credentials submitted."),
          default => response()->success((object) ['name' => $user->name, 'email' => $user->email], "Login Successful")
        };
    }
}
