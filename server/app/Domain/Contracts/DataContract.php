<?php


namespace App\Domain\Contracts;

/**
 * Interface DataContract
 * @package App\Domain\Contracts
 */
interface DataContract
{
    public const FIELD_ID         = 'id';
    public const FIELD_UUID       = 'uuid';
    public const FIELD_AGENDA     = 'agenda';
    public const FIELD_TOPIC      = 'topic';
    public const FIELD_TEXT       = 'text';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';
    public const FIELD_DELETED_AT = 'deleted_at';
}
