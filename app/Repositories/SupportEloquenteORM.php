<?php

namespace App\Repositories;

use stdClass;
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use App\DTO\{CreateSupportDTO, UpdateSupportDTO};


class SupportEloquenteORM implements SupportRepositoryInterface
{

    public function __construct(
        protected Support $model
    ) {
    }
    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }
    public function findOne(string $id): stdClass|null
    {
        $support = $this->model->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }
    public function new(CreateSupportDTO $data): stdClass
    {
        $support = $this->model->create(
            (array) $data
        );

        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $data): stdClass|null
    {
        if (!$support = $this->model->find($data->id)) {
            return null;
        }

        $support->update(
            (array) $data
        );

        return (object) $support->toArray();
    }
    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}
