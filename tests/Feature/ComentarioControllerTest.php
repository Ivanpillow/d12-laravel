<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_listado_comentarios(): void
    {
        $response = $this->get('/comentario');
        $response->assertRedirect('/login');

        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/comentario');
        $response->assertStatus(200)
                ->assertSee('Listado de Comentarios');
    }

    public function test_formulario_creacion_comentario(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get(route('comentario.create'));
        $response->assertStatus(200)
                ->assertSee('textarea name="comentario"', false);
    }

    public function test_creacion_comentario(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('comentario.store'), [
            'comentario' => 'Comentario de prueba',
            'ciudad' => 'Tonalá',
        ]);

        $this->assertDatabaseHas('comentarios', [
            'comentario' => 'Comentario de prueba',
        ]);

        $response->assertRedirect(route('comentario.index'));
    }

    /** @test */
    public function verifica_validacion_al_crear()
    {
        //$this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('comentario.store'), [
            'ciudad' => 'Tonalá',
        ]);

        $response->assertInvalid(['comentario']);
    }
}
