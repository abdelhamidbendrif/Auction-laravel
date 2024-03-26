<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'pid';
    protected $fillable = ['name', 'description','image','category', 'expiration_time']; // Include 'category' in fillable fields

    /**
     * Calculate the remaining time until product expiration.
     *
     * @return string
     */
    public function remainingTime(): string
    {
        $expirationTime = $this->expiration_time;
        if ($expirationTime) {
            $now = Carbon::now();
            $expiration = Carbon::parse($expirationTime);
            if ($now < $expiration) {
                return $now->diff($expiration)->format('%Yy %Mm %Dd %Hh %Im %Ss');
            }
        }
        return 'Expired';
    }
}
