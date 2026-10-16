<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiries';
    protected $primaryKey = 'inquiry_id';

    protected $fillable = [
        'tenant_id',
        'subject',
        'message',
        'inquiry_type',
        'status',
        'admin_response',
        'resolved_at',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public const TYPES = [
        'general' => 'General inquiry',
        'maintenance' => 'Maintenance request',
    ];

    public const STATUSES = [
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'resolved' => 'Resolved',
        'closed' => 'Closed',
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id', 'user_id');
    }
}
