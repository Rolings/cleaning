<?php

namespace App\Http\Resources\Admin\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'image_id'    => $this->image_id,
            'image'       => $this->imageUrl,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'price'       => $this->price,
            'description' => $this->description,
        ];
    }
}
