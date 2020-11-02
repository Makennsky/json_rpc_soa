<?php

namespace App\Models;

use App\Domain\Contracts\DataContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 * Class Data
 * @package App\Models
 */
class Data extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        DataContract::FIELD_AGENDA,
        DataContract::FIELD_TOPIC,
        DataContract::FIELD_TEXT,
    ];

    protected $hidden   = [
        DataContract::FIELD_CREATED_AT,
        DataContract::FIELD_UPDATED_AT,
        DataContract::FIELD_DELETED_AT
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            if (!$model->getAttribute(DataContract::FIELD_UUID)) {
                $model->setAttribute(
                    DataContract::FIELD_UUID,
                    Uuid::uuid4()->toString()
                );
            }
        });
    }
}
