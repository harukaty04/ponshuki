<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Http\Requests\CreateTask;
use App\Models\Review;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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
        // $review = factory(Review::class)->create(['user_id' => $user->id]);

        
        $response = $this->actingAs($user)
        ->get(route('top.index'));

        $response->assertStatus(200)
            ->assertViewIs('top.index')
            ->assertSee('投稿する')
            ->assertSee($user->name . ' さん');
        
    }

    /**
     *　投稿機能のテスト
     * 
     */
    

    //未ログイン時
    public function testGuestCreate()
    {
        $response = $this->post(route('top.create'));
        $response->assertRedirect('login');
    }

    // ログイン時
    public function testReviewCreate()
    {
        // テストユーザー作成
        $user = factory(User::class)->create();

        $request_params = [
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
        ];


        $response = $this->actingAs($user, 'web')->from(route('top.index'))->post(route('top.create', $request_params));

        $response->assertStatus(302);
        // テストデータがDBに登録されているかテスト
        $this->assertDatabaseHas('reviews', [
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
            
        ]);

        $response->assertRedirect(route('top.index'));
    }

    /**
     *　投稿の編集画面 表示機能のテスト
     * 
     */
    

    //未ログイン時
    public function  testGuestEdit()
    {
        // $review = factory(Review::class)->create();
        // dd ($review);
        $response = $this->get(route('review.update'));
        $response->assertRedirect(route('login'));
    }

    /**
     *　ログインしている場合に
     *　編集前のtitle~contentが入力されているか確認
     */

    public function testAuthEdit()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $review = Review::create([
            'user_id'         => $user->id,
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
            
            ]);

        $response = $this->actingAs($user)->get(route('review.edit', ['review' => $review]));

        $response->assertStatus(200)->assertViewIs('review.edit');
    }

    /**
     *　投稿削除機能のテスト
     * 
     */

    public function testDestroy()
    {
        $this->withoutExceptionHandling();

        // テストデータをDBに保存
        $user = factory(User::class)->create();
        
        $review = Review::create([
            'user_id'         => $user->id,
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
            
            ]);
    
        // DBからテストデータを削除
        $response = $this->actingAs($user)->post(route('review.destroy', ['review_id' => $review->id]));

        // テストデータがDBから削除されているかテスト
        $this->assertDatabaseMissing('reviews', [
            'id'         => $review->id,
        ]);

        $response->assertRedirect(route('top.index'));
    }

}
