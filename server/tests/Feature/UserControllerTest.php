<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
/**
     * ユーザープロフィール編集画面 表示機能のテスト 
     *
     * @return void
     */

    // 未ログイン時
    public function  testGuestEdit()
    {
        $user = factory(User::class)->create();

        $response = $this->get(route('user.edit_profile', ['name' => $user->name]));
        $response->assertRedirect(route('login'));
    }

    //ログイン時
    public function testAuthEdit()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('user.edit_profile', ['name' => $user->name]));

        $response->assertStatus(200)->assertViewIs('user.edit_profile');
    }
}

