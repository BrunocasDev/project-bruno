<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UsersTableSeeder;

test('Authenticated user can add a contact', function () {
    // Chama a seeder para criar um user
    $this->seed(UsersTableSeeder::class);

    // Obtém o user criado pela seeder
    $user = User::first();

    // Autentica o user
    $this->actingAs($user);

    // Dados do contacto a serem adicionados
    $data = [
        'name' => 'John Doe',
        'contact' => '123456789',
        'email' => 'john@example.com',
    ];

    // Envia o formulário de adição de contacto
    $response = $this->post('contacts/create', $data);

    // Verifica se a página foi redirecionada após o envio do formulário
    $response->assertStatus(302);

    // Verifica se os dados foram inseridos corretamente na base de dados
    $this->assertDatabaseHas('contacts', [
        'name'      => $data['name'],
        'contact'   => $data['contact'],
        'email'     => $data['email'],
    ]);
});


test('Authenticated user cannot add contact with invalid data', function () {
    // Chama a seeder para criar um user
    $this->seed(UsersTableSeeder::class);

    // Obtém o user criado pela seeder
    $user = User::first();

    // Autentica o user
    $this->actingAs($user);

    // Dados inválidos do contacto a serem adicionados
    $invalidData = [
        'name' => '', // Nome vazio
        'contact' => '', // Contacto vazio
        'email' => 'email_invalido', // Email inválido
    ];

    // Envia o formulário de adição de contacto com dados inválidos
    $response = $this->post('contacts/create', $invalidData);

    // Verifica se a página não foi redirecionada após o envio do formulário
    $response->assertStatus(302);

    // Verifica se os dados inválidos não foram inseridos na base de dados
    $this->assertDatabaseMissing('contacts', [
        'name'      => $invalidData['name'],
        'contact'   => $invalidData['contact'],
        'email'     => $invalidData['email'],
    ]);
});


test('Unauthenticated user cannot access contact add page', function () {
    // Tentativa de acesso à página de adição de contactos sem autenticação
    $response = $this->get('contacts/create');

    // Verifica se a tentativa de acesso é redirecionada para a página de login
    $response->assertRedirect('/login');
});
