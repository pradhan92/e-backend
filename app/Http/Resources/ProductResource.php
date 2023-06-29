<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "selling_price" => $this->sale_price,
            "discount(%)" => $this->discount_percent,
            //"discount_amount" => $this->price - $this->sale_price, //show as amout
            "discount_amount" => - ($this->price - $this->sale_price), //show in minus
            "description" => $this->description,
            "category" => $this->category->name,
            "image" => asset($this->image),
            "published" => $this->created_at->diffForHumans(),

        ];
    }
}
