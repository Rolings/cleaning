<?php

namespace App\Http\Resources\Admin\Callback;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'phone'      => $this->phone,
            'service_id' => $this->service_id,
            'service'    => is_null($this->service_id) ? null : $this->service,
            'comment'    => $this->comment,
            'is_read'    => $this->is_read,
            'created_at' => $this->created_at->format('d F Y / h:i A')
        ];
    }
}
