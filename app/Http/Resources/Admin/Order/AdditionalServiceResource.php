<?php

namespace App\Http\Resources\Admin\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalServiceResource extends JsonResource
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
            'icon_id'     => $this->icon_id,
            'icon'        => $this->iconUrl,
            'base64image' => $this->base64image,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
        ];
    }
}
