<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'problem',
        'status',
        'ip_address',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'new'       => 'Novo',
            'contacted' => 'Contatado',
            'closed'    => 'Encerrado',
            default     => 'Desconhecido',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'new'       => '#2563EB',
            'contacted' => '#F59E0B',
            'closed'    => '#10B981',
            default     => '#6B7280',
        };
    }
}
