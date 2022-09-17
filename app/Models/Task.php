<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'task_name',
        'start_date',
        'end_date',
        'status',
        'priority',
        'task_description',
    ];

    protected $casts = [
        'start_date'=> 'date',
        'end_date' => 'date',
        'status' => 'integer',
        'priority' => 'integer',
    ];

    /**
     * Status.
     */
    private const ONPENDING = 1;
    private const ONPROCESS = 2;
    private const DONE = 3;
    private const STATUS_TYPES = [
        self::ONPENDING => 'Pending',
        self::ONPROCESS => 'On Process',
        self::DONE => 'Done',
    ];

    /**
     * Priority.
     */
    private const URGENT = 1;
    private const HIGH = 2;
    private const MEDIUM = 3;
    private const LOW = 4;
    private const PRIORITY_TYPES = [
        self::URGENT => 'Urgent',
        self::HIGH => 'High',
        self::MEDIUM => 'Medium',
        self::LOW => 'Low',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatus()
    {
        return self::STATUS_TYPES[$this->status];
    }

    public function getPriority()
    {
        return self::PRIORITY_TYPES[$this->priority];
    }

    public function scopeStatus($query, $status = null)
    {
        if ($status == null) {
            return $query;
        } else {
            return $query->where('status', $status);
        }
    }

    public function scopePriority($query, $priority = null)
    {
        if ($priority == null) {
            return $query;
        } else {
            return $query->where('priority', $priority);
        }
    }

    public function scopeLabel($query, $keywords = null)
    {
        if ($keywords == null) {
            return $query;
        } else {
            return $query->Where('label', 'like', '%' . $keywords . '%');
        }
    }
    public function scopeName($query, $keywords = null)
    {
        if ($keywords == null) {
            return $query;
        } else {
            return $query->Where('task_name', 'like', '%' . $keywords . '%');
        }
    }

    public function scopeDescript($query, $keywords = null)
    {
        if ($keywords == null) {
            return $query;
        } else {
            return $query->Where('task_description', 'like', '%' . $keywords . '%');
        }
    }
    public function scopeStartDate($query, $startDate=null, $endDate=null)
    {
        if ($startDate == null) {
            return $query;
        } else {
            return $query->whereDate('start_date', '>', $startDate);
        }
    }

    public function scopeEndDate($query, $endDate=null)
    {
        if ($endDate == null) {
            return $query;
        } else {
            return $query->whereDate('end_date', '<', $endDate);
        }
    }
}
