<?php

namespace App\DTO;

class FormPropertyDTO
{
    public  $type;
    public  $label;
    public  $data;
    public $dynamicforms_id;

    public function __construct($data,  $dynamicforms_id = null)
    {
        $this->type = $data['type'] ?? '';
        $this->label = $data['label'] ?? '';
        $this->data = json_encode($data['data']) ?? "";
        $this->dynamicforms_id = $dynamicforms_id ?? $data['dynamicforms_id'] ;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
