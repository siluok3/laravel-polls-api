<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Poll extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->title.'.',
        ];
    }
}
