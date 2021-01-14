<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    private $category;

    public function setUp() :void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();

        $this->category = Category::create([
            'name' => 'Test Category'
        ]);
    }


    /** @test */
    public function posts_can_be_added()
    {
        $this->withoutExceptionHandling();

        //hitting end point
        $response = $this->actingAs($this->user)->post('post', [
            'title' => 'Test title',
            'category_id' => $this->category->id,
            'description' => 'this is a description',
            'is_published' => true
        ]);

        //checking some conditions
        $response->assertRedirect('post');
        $response->assertSessionHas('success', 'Post created suceessfully.');
        $this->assertCount(1, Post::all());
    }


    /** @test */
    public function posts_can_be_updated()
    {
        $this->withoutExceptionHandling();

        //hitting end point of create
        $this->actingAs($this->user)->post('post', [
            'title' => 'Test title',
            'slug' => 'test-title',
            'category_id' => $this->category->id,
            'description' => 'this is a description',
            'is_published' => true
        ]);
        $this->assertCount(1, Post::all());

        $post = Post::first();

        //hitting end point of update
        $response = $this->actingAs($this->user)->patch('/post/' . $post->slug, [
            'title' => 'Test title updated',
            'slug' => 'test-title-updated',
            'category_id' => $this->category->id,
            'description' => 'this is a description which is updated now',
            'is_published' => false
        ]);

        //checking some conditions
        $response->assertSessionHas('success', 'Post updated suceessfully.');
        $response->assertRedirect('post');
        $this->assertEquals('Test title updated', Post::first()->title);
    }

    /** @test */
    public function post_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        //hitting end point of create
        $this->actingAs($this->user)->post('post', [
            'title' => 'Test title',
            'slug' => 'test-title',
            'category_id' => $this->category->id,
            'description' => 'this is a description',
            'is_published' => true
        ]);
        $this->assertCount(1, Post::all());

        $post = Post::first();

        //hitting end point of delete
        $post->delete('/post/' . $post->slug);
        $this->assertCount(0, Post::all());
    }
}
