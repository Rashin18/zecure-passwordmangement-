<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('password can be updated', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'), // ✅ ensure correct password is known
    ]);

    $response = $this
        ->actingAs($user)
        ->from('/profile')
        ->post('/change-password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
});

test('correct password must be provided to update password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'), // ✅ force known password
    ]);

    $response = $this
        ->actingAs($user)
        ->from('/profile')
        ->post('/change-password', [
            'current_password' => 'wrong-password', // ❌ wrong on purpose
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasErrorsIn('updatePassword', 'current_password')
        ->assertRedirect('/profile');
});
