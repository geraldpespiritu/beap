<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewIllustration extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
        return[
          'id' => $this->id,
          'illName' => $this->illName,
          'illDesc' => $this->illDesc
        ];
    }

    public function with($request){
        return [
          'version' => '1.0.0',
          'author_url' => url('http://traversymedia.com')
        ];
    }
}
