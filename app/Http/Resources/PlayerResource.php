<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $host='https://dea1-105-34-44-196.ngrok-free.app/saba7o_BackEnd/public';
        return [
            'status' => $this->status,
            'image' =>$host.$this->image,
            'name' =>$this->name,
        ];
    }
}
