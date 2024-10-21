<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->ID,
            'type' => 'books',
            'attributes' => [
                'title' => $this->Title,
                'publisher' => $this->Publisher,
                'publish_year' => $this->PublishYear,
                'bibid' => $this->BIBID,
                'collections_count' => $this->collections_count,
                'Languages' => $this->Languages,
            ],
            'collections' => $this->collections->map(function ($collection) {
                return [
                    'barcode' => $collection->NomorBarcode,
                    'call_number' => $collection->CallNumber,
                    'availability' => $collection->ISOPAC == 1 ? 'Available' : 'Not Available',
                    'location' => $collection->location->Name,
                ];
            }),
        ];
    }
    
}

