<?php 

namespace App\DTO;


class FormStoreDTO
{
    public $title;
    public function __construct( $data)
    {
        $this->title = $data['title'] ?? null;
    }

    public function toArray()
    {
         return get_object_vars($this);
    }

  
}