<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Http\Requests\CreateTask;
use App\Models\Review;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class ReviewControllerTest extends TestCase
{

    use RefreshDatabase;
    /**
     * 投稿一覧表示機能のテスト
     *
     * 
     */
    public function testGuestIndex()
    {
        $response = $this->get(route('top.index'));
        // リダイレクト処理になっていることを確認
        $response->assertStatus(302);
    }

    //ログイン時
    public function testAuthIndex()
    {

        // FactoryでUserに紐づくReviewを一括で生成する
        $user = factory(User::class)->create();
        $review = factory(Review::class)->create(['user_id' => $user->id]);

        
        $response = $this->actingAs($user)
        ->get(route('top.index'));

        $response->assertStatus(200)
            ->assertViewIs('top.index')
            ->assertSee('投稿する')
            ->assertSee($user->name . ' さん');
        
    }

    /**
     *　投稿画面表示機能のテスト
     * 
     *
     */


    //未ログイン時
    public function testGuestCreate()
    {
        $response = $this->get(route('review.create'));

        $response->assertRedirect('login');
    }

    //ログイン時
    public function testAuthCreate()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        ->get(route('review.create'));

        $response->assertStatus(200)
        ->assertViewIs('review.create');
    }

    /**
     *　投稿機能のテスト
     * 
     *
     * 
     */
    

    // 未ログイン時
    // public function testGuestStore()
    // {
    //     $response = $this->post(route('articles.store'));

    //     $response->assertRedirect('login');
    // }

    // ログイン時
    // public function testAuthStore()
    // {
    //     // テストデータをDBに保存
    //     $user = factory(User::class)->create();

    //     $body = "テスト本文";
    //     $user_id = $user->id;

    //     $response = $this->actingAs($user)
    //     ->post(route('articles.store',
    //     [
    //         'body' => $body,
    //         'user_id' => $user_id,
    //         ]
    //     ));

    //     // テストデータがDBに登録されているかテスト
    //     $this->assertDatabaseHas('articles', [
    //         'body' => $body,
    //         'user_id' => $user_id
    //     ]);

    //     $response->assertRedirect(route('top.index'));
    // }

    ### 投稿の編集画面 表示機能のテスト ###

    // 未ログイン時
    // public function  testGuestEdit()
    // {
    //     $article = factory(Article::class)->create();

    //     $response = $this->get(route('articles.edit', ['article' => $article]));
    //     $response->assertRedirect(route('login'));
    // }

    // ログイン時
    // public function testAuthEdit()
    // {
    //     $this->withoutExceptionHandling();
    //     $review = factory(Review::class)->create();
    //     $user = $review->user;

    //     $response = $this->actingAs($user)->get(route('review.edit', ['review' => $review]));

    //     $response->assertStatus(200)->assertViewIs('review.edit');
    // }

    ### 投稿削除機能のテスト ###
    // public function testDestroy()
    // {
    //     $this->withoutExceptionHandling();

    //     // テストデータをDBに保存
    //     $user = factory(User::class)->create();

    //     $content = "テスト本文";
    //     $user_id = $user->id;

    //     $review = Review::create([
    //         'content' => $content,
    //         'user_id' => $user->id,
    //         ]);

        // DBからテストデータを削除
    //     $response = $this->actingAs($user)->delete(route('54view.destroy', ['review' => $review]));

    //     // テストデータがDBから削除されているかテスト
    //     $this->assertDatabaseMissing('review', [
    //         'content' => $content,
    //         'user_id' => $user_id
    //     ]);

    //     $response->assertRedirect(route('top.index'));
    // }

}
