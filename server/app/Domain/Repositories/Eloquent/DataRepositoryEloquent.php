<?php

namespace App\Domain\Repositories\Eloquent;

use App\Domain\Contracts\DataContract;
use App\Domain\Repositories\DataRepositoryInterface;
use App\Models\Data;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

/**
 * Class DataRepositoryEloquent
 * @package App\Domain\Repositories\Eloquent
 */
class DataRepositoryEloquent implements DataRepositoryInterface
{
    /**
     * @param $data
     * @return Builder|Model|string
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $model = Data
                ::query()
                ->create($data);
            DB::commit();
            return $model;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    /**
     * @param $UUID
     * @return Builder|Model|string
     */
    public function get($UUID)
    {
        try {
            return Data
                ::query()
                ->where(DataContract::FIELD_UUID, $UUID)
                ->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            return $exception->getMessage();
        }
    }
}
