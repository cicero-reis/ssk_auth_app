<?php

use App\Models\User;
use App\DTOs\Auth\LoginDTO;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Auth\LoginService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns a valid JWT token when authenticating with correct credentials', function () {
    // Arrange: create a user
    $user = User::factory()->create();

    // Create the DTO with credentials
    $loginDTO = new LoginDTO(
        email: $user->email,
        password: 'password',
    );

    // Create a real instance of the service
    $service = app(LoginService::class);

    // Act: call the method
    $token = $service->execute($loginDTO);

    // Assert
    expect($token)->toBeString()
        ->and(JWTAuth::setToken($token)->authenticate()->id)->toBe($user->id);
});

it('returns Unauthorized when authenticating with incorrect credentials', function () {
    // Arrange: create a user with a known password
    $user = User::factory()->create();

    // Create a DTO with incorrect credentials
    $loginDTO = new LoginDTO(
        email: $user->email,
        password: 'wrong-password', // Using a wrong password
    );

    // Create the service
    $service = app(LoginService::class);

    // Act: call the method
    $token = $service->execute($loginDTO);

    // Assert: the token should be an empty string (authentication should fail)
    expect($token)->toBe('');
});
