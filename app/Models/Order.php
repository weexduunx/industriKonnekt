<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function buyerCompany()
    {
        return $this->belongsTo(Company::class, 'buyer_company_id');
    }

    public function sellerCompany()
    {
        return $this->belongsTo(Company::class, 'seller_company_id');
    }

    public function productService()
    {
        return $this->belongsTo(ProductService::class, 'product_service_id');
    }
}
