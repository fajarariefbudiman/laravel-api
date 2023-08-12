<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->price,
            'stock' => $this->stock,
            'created_at' => date_format($this->created_at,'d/m/Y h:i:s'),
            'updated_at' => date_format($this->updated_at,'d/m/Y h:i:s'),
            'category' => $this->category
        ];
    }
}
