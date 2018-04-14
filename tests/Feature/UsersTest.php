<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_admin_can_create_user()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs($this->adminUser())
            ->post(route('users.store'), [
                'name' => 'Faustino Vasquez'
            ])->assertRedirect('admin/users/faustino-vasquez/edit');
    }

    public function test_admin_can_update_user()
    {
        $this->withoutExceptionHandling();
        $user =  $this->a_user(['name'=>'Faustino Vasquez']);
        $this->actingAs($this->adminUser())
            ->get(route('users.edit', $user))
            ->assertSeeI('Faustino Vasquez');

//        $this->actingAs($this->adminUser())
//            ->put('users.update');
    }
}
