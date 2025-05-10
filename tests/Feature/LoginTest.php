<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows login with valid credentials', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->postJson(route('api.v1.auth.login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // Assert
    $response->assertOk();
    $response->assertJsonStructure([
        'access_token',
        'token_type',
        'expires_in'
    ]);
});

