<?php

namespace App\Controller;

use App\Handlers\Request\Auth;
use Exception;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends ApiController
{
    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param Auth $handler
     * @return JsonResponse
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, Auth $handler): JsonResponse
    {
        $request = $this->transformJsonBody($request);

        try {
            $user = $handler->handleRegister($request, $encoder);
        } catch (Exception $exception) {
            return $this->respondValidationError("Invalid Password or Email");
        }

        return $this->respondWithSuccess(sprintf('User %s successfully created', $user->getUsername()));
    }
}
