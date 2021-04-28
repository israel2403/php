<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    public $collects = ArticleResource::class;
    /**
     * Transform the resource collection into a array
     *
     * @param Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' =>$this->collection
        ];
    }
}
