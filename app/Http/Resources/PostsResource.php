<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable {
        return [
            'id' => $this->id,
            'author' => (new UserResource($this->resource))->toArray($this->author),
            'title' => $this->title,
            'description' => $this->description,
            'image_thumb' => Storage::url('image/post/thumbnail/') . $this->image_path,
            'favorite_added' => (new FavoritesResource($this->resource))->toArray($this->id)
        ];
    }
}
