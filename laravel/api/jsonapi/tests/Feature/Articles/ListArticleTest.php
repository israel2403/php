<?php

namespace Tests\Feature\Articles;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListArticleTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_fetch_single_article()
    {
        $article = Article::factory()->create();
        $response = $this->getJson(route('api.v1.articles.show', $article));
        $response->assertExactJson([
            'data' => [
                'type' => 'articles',
                'id' => (string)$article->getRouteKey(),
                'attributes' => [
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'content' => $article->content,
                ],
                'links' => [
                    'self' => route('api.v1.articles.show', $article)
                ]
            ]
        ]);
    }

    /** @test */
    public function can_fetch_all_article()
    {
        $articles = Article::factory()->times(3)->create();
        $response = $this->getJson(route('api.v1.articles.indexOrderBy'));
        $response->assertJsonFragment([
            'data' => [
                [
                    'type' => 'articles',
                    'id' => (string)$articles[0]->getRouteKey(),
                    'attributes' => [
                        'title' => $articles[0]->title,
                        'slug' => $articles[0]->slug,
                        'content' => $articles[0]->content,
                    ],
                    'links' => [
                        'self' => route('api.v1.articles.show', $articles[0])
                    ]
                ],
                [
                    'type' => 'articles',
                    'id' => (string)$articles[1]->getRouteKey(),
                    'attributes' => [
                        'title' => $articles[1]->title,
                        'slug' => $articles[1]->slug,
                        'content' => $articles[1]->content,
                    ],
                    'links' => [
                        'self' => route('api.v1.articles.show', $articles[1])
                    ]
                ],
                [
                    'type' => 'articles',
                    'id' => (string)$articles[2]->getRouteKey(),
                    'attributes' => [
                        'title' => $articles[2]->title,
                        'slug' => $articles[2]->slug,
                        'content' => $articles[2]->content,
                    ],
                    'links' => [
                        'self' => route('api.v1.articles.show', $articles[2])
                    ]
                ],
            ]
        ]);

        /*
        $response->assertJsonStructure([
            'links' => [],
            'meta' => []
        ]); */
    }
}