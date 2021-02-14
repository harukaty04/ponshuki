<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;
use App\Models\Like;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 新規レビュー作成時はいいねが０の状態であることをテスト
     * @test
     */
    public function Likes_新規レビュー作成時はいいねが０の状態であることをテスト()
    {
        //userからidを取得し$reviewに入れる
        $user = factory(User::class)->create();

        $review = Review::create([
            'user_id'         => $user->id,
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
            
            ]);
    
        $result = $review->isLikedBy($user);
        
        $this->assertFalse($result);
    }

    /**
     * レビューを作成したユーザーがいいねをした際のテスト
     * @test
     */
    public function Likes_ユーザーがいいねした場合のテスト()
    {
        $user = factory(User::class)->create();
        $user_id = $user->id;
        $expected_num = 1; 

        $review = Review::create([
            'user_id'         => $user_id,
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
        ]);
        $review_id =$review->id;

        $response= $this->actingAs($user)->post(route('likes.create', [
            'review_id' => $review_id,
            'user_id'    =>$user_id])
        );
        $decode_response = json_decode($response->content());

        // $result = $review->isLikedBy($user);
        // $like = Like::get()->toArray();

        $this->assertEquals($expected_num, $decode_response->review_likes_count);
    }

    /**
     * ユーザーがいいねを外した場合のテスト
     * @test
     */
    public function Likes_ユーザーがいいねを外した場合のテスト()
    {
        $user = factory(User::class)->create();
        $user_id = $user->id;
        $expected_num = 0; 

        $review = Review::create([
            'user_id'         => $user_id,
            'title'           => 'テスト', 
            'content'         => "テスト本文",
            'taste_intensity' => 1,
            'scent_strength'  => 1,
            'evaluation'      => 1,
        ]);
        $review_id =$review->id;
        
        //いいねしている状態
        $response= $this->actingAs($user)->post(route('likes.create', [
            'review_id' => $review_id,
            'user_id'    =>$user_id])
        );
        //いいねを解除
        $response= $this->actingAs($user)->post(route('likes.create', [
            'review_id' => $review_id,
            'user_id'    =>$user_id])
        );
        
        $decode_response = json_decode($response->content());

        $this->assertEquals($expected_num, $decode_response->review_likes_count);
    }
}   
