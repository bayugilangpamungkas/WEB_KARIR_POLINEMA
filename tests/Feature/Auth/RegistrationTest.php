<?php

<<<<<<< HEAD
test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

=======
>>>>>>> origin/development
test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
<<<<<<< HEAD
    $response->assertRedirect(route('dashboard', absolute: false));
=======
    $response->assertNoContent();
>>>>>>> origin/development
});
