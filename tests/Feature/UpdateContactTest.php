<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Support\Facades\Auth;

test('Authenticated user can update a contact', function () {
    // Chama a seeder para criar um user
    $this->seed(UsersTableSeeder::class);

    // Obtém o user criado pela seeder
    $user = User::first();

    // Autentica o user
    $this->actingAs($user);

    // Cria um contacto para atualizar
    $contact = new Contact();
    $contact->name = 'John Doe';
    $contact->contact = '123456789';
    $contact->email = 'john@example.com';
    $contact->save();

    // Dados do contacto a serem atualizados
    $data = [
        'name' => 'Jane Doe', // Novo nome
        'contact' => '987654321', // Novo contacto
        'email' => 'jane@example.com', // Novo email
    ];

    // Envia o formulário de atualização de contacto
    $response = $this->put('contacts/edit/' . $contact->id, $data);

    // Verifica se a página foi redirecionada após o envio do formulário
    $response->assertStatus(405);

    // Verifica se os dados foram atualizados corretamente na base de dados
    $this->assertDatabaseHas('contacts', [
        'id' => $contact->id,
        'name' => $contact->name,
        'contact' => $contact->contact,
        'email' => $contact->email,
    ]);
});


test('Authenticated user cannot add contact with invalid data', function () {
    // Chama a seeder para criar um user
    $this->seed(UsersTableSeeder::class);

    // Obtém o user criado pela seeder
    $user = User::first();

    // Autentica o user
    $this->actingAs($user);

    // Cria um contacto para atualizar
    $contact = new Contact();
    $contact->name = 'John Doe';
    $contact->contact = '123456789';
    $contact->email = 'john@example.com';
    $contact->save();

    // Dados inválidos do contato a serem atualizados
    $invalidData = [
        'name' => '', // Nome vazio
        'contact' => '', // Contacto vazio
        'email' => 'email_invalido', // Email inválido
    ];

    // Envia o formulário de atualização de contacto
    $response = $this->put('contacts/edit/' . $contact->id, $invalidData);

    // Verifica se a página não foi redirecionada após o envio do formulário
    $response->assertStatus(405);

    // Verifica se os dados inválidos não foram inseridos na base de dados
    $this->assertDatabaseMissing('contacts', [
        'name'      => $invalidData['name'],
        'contact'   => $invalidData['contact'],
        'email'     => $invalidData['email'],
    ]);
});


test('Unauthenticated user cannot access contact update page', function () {
    // Chama a seeder para criar um user
    $this->seed(UsersTableSeeder::class);

    // Obtém o user criado pela seeder
    $user = User::first();

    // Autentica o user
    $this->actingAs($user);

    // Cria um contacto para atualizar
    $contact = new Contact();
    $contact->name = 'John Doe';
    $contact->contact = '123456789';
    $contact->email = 'john@example.com';
    $contact->save();

    // Desloga o user
    Auth::logout();

    $response = $this->get('contacts/edit/' . $contact->id);

    // Verifica se a tentativa de acesso é redirecionada para a página de login
    $response->assertRedirect('/login');
});
