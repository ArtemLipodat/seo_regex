<?php

namespace App\Http\Resources;

use App\Models\Favorites;
use App\Models\FavoritesAdded;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class FavoritesResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable {
        $added =  FavoritesAdded::where('post_id', $request)->first();
        if ($added) return $added;
        return [
            'added' => 0
        ];
    }
}
