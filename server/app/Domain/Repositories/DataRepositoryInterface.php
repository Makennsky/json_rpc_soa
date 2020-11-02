<?php


namespace App\Domain\Repositories;

/**
 * Interface DataRepositoryInterface
 * @package App\Domain\Repositories
 */
interface DataRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $UUID
     * @return mixed
     */
    public function get($UUID);
}
