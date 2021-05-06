<?php

namespace App\Http\Resources\Post;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'create_date' => $this->created_at->format('H:i d.m.Y'),
            'author' => User::find($this->user_id)->name,
        ];
    }
}
