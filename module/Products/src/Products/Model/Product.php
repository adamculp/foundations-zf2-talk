<?php
namespace Products\Model;

class Product
{
    public $id;
    public $name;
    public $description;
    public $quantity;
    public $image;
    
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id']))     ? $data['id']     : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->description  = (isset($data['description']))  ? $data['description']  : null;
        $this->quantity  = (isset($data['quantity']))  ? $data['quantity']  : null;
        $this->image  = (isset($data['image']))  ? $data['image']  : null;
    }
}
