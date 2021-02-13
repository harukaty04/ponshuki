<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;
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

    
}
