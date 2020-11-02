<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Domain\Repositories\DataRepositoryInterface;
use App\Http\Requests\CreateDataRequest;
use App\Http\Requests\GetDataRequest;
use Sajya\Server\Procedure;

/**
 * Class DataProcedures
 * @package App\Http\Procedures
 */
class DataProcedures extends Procedure
{
    /**
     * @var DataRepositoryInterface
     */
    protected DataRepositoryInterface $repository;

    /**
     * DataProcedures constructor.
     * @param DataRepositoryInterface $repository
     */
    public function __construct(DataRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @var string
     */
    public static string $name = 'data';

    /**
     * @param CreateDataRequest $request
     * @return mixed
     */
    public function store(CreateDataRequest $request)
    {
        return $this->repository->store($request->all());
    }

    /**
     * @param GetDataRequest $request
     * @return mixed
     */
    public function get(GetDataRequest $request)
    {
        return $this->repository->get(data_get($request, 'uuid'));
    }
}
