<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'artist' => ArtistResource::make($this->artist),
            'album' => AlbumResource::make($this->album),
            'genre' => GenreResource::make($this->genre),
            'date' => $request->created_at

        ];
    }
}
