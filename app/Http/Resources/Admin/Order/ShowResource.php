<?php

namespace App\Http\Resources\Admin\Order;

use App\Models\{Service, Order, OrderEntity, AdditionalService};
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Order\OfferResource;

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
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'phone'      => $this->phone,
            'email'      => $this->email,
            'is_read'    => $this->is_read,
            'address'    => $this->apt_suite . ' ' . $this->address . ' ' . $this->city . ' ' . $this->state->postal_abbreviation . ' ' . $this->zip,
            'order_at'   => $this->order_at->format('d F Y / h:i A'),
            'created_at' => $this->created_at->format('d F Y / h:i A'),
            'offer'      => new OfferResource($this->offer),
            'services'   => $this->entities->partition(function ($service) {
                return $service->entity instanceof Service;
            })->map(function ($items) {
                return $items->map(function ($service) {
                    if ($service->entity instanceof Service) {
                        return new ServiceResource($service->entity);
                    }
                    if ($service->entity instanceof AdditionalService) {
                        return new AdditionalServiceResource($service->entity);
                    }
                });
            }),
        ];
    }
}
