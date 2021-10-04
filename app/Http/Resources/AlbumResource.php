<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->user;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'photos' => $this->photos->pluck('url')
        ];
    }
}
