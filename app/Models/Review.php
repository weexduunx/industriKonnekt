<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function reviewerUser()
    {
        return $this->belongsTo(User::class, 'reviewer_user_id');
    }

    public function targetCompany()
    {
        return $this->belongsTo(Company::class, 'target_company_id');
    }
}
