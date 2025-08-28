<?php

use App\Models\Employee;
use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('users can authenticate using login form', function () {
    $this->seed();
    $employee = Employee::factory()->create();

    $response = $this->post('/login', [
        'empid' => $employee->code,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: true));
});

test('users can not authenticate with invalid password', function () {
    $this->seed();
    $employee = Employee::factory()->create();

    $response = $this->post('/login', [
        'empid' => $employee->code,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
    $response->assertRedirect(route('login'));
});

test('users can logout', function () {
    $this->seed();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect(route('login'));
});
