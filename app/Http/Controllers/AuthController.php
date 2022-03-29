<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Grpc\Contracts\ErrorHandler;
use App\Service\Grpc\Contracts\ClientFactory;
use Protobuf\Identity\AuthServiceClient;
use Protobuf\Identity\SignInRequest;
use Protobuf\Identity\SignUpRequest;

class AuthController extends Controller
{
    protected ClientFactory $grpcClientFactory;

    protected ErrorHandler $errorHandler;

    public function __construct(ClientFactory $grpcClientFactory, ErrorHandler $errorHandler)
    {
        $this->grpcClientFactory = $grpcClientFactory;
        $this->errorHandler = $errorHandler;
    }


    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $client = $this->grpcClientFactory->make(AuthServiceClient::class);

        $signUpRequest = new SignUpRequest();

        $signUpRequest->setEmail($request->input("email"));
        $signUpRequest->setName($request->input("name"));
        $signUpRequest->setPassword($request->input("password"));
        $signUpRequest->setPasswordConfirmation($request->input("password_confirmation"));

        [$response, $status] = $client->SignUp($signUpRequest)->wait();

        $this->errorHandler->handle($status, 3);

        $data = [
            "id" => $response->getId(),
            "token" => $response->getToken()
        ];

        return response()->json($data);
    }


    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $client = $this->grpcClientFactory->make(AuthServiceClient::class);

        $signInRequest = new SignInRequest();

        $signInRequest->setEmail($request->input("email"));
        $signInRequest->setPassword($request->input("password"));

        [$response, $status] = $client->SignIn($signInRequest)->wait();

        $this->errorHandler->handle($status, 3);

        $data = [
            "id" => $response->getId(),
            "token" => $response->getToken()
        ];

        return response()->json($data);
    }
}
