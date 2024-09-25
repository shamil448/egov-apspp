<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackResponse extends Model
{
    use HasFactory;

    protected $fillable = ['feedback_id', 'user_id', 'response_text'];

    public function FeedbackForm()
    {
        return $this->belongsTo(FeedbackForm::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
