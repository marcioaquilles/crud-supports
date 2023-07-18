<?php

namespace App\Services;

use stdClass;
use App\Repositories\SupportRepositoryInterface;
use App\DTO\{CreateSupportDTO, UpdateSupportDTO};


class SupportService
{
    public function __construct(
        protected SupportRepositoryInterface $repository
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    // public function new(
    //     string $subject,
    //     string $status,
    //     string $body,
    // ): stdClass {
    //     // TODO: Implement new() method.
    //     return $this->repository->new([
    //         'subject' => $subject,
    //         'status' => $status,
    //         'body' => $body
    //     ]);
    // }

    public function new(CreateSupportDTO $data): stdClass
    {
        return $this->repository->new($data);
    }

    // public function update(int $id, string $subject, string $status, string $body): stdClass|null
    // {
    //     $data = [
    //         'subject' => $subject,
    //         'status' => $status,
    //         'body' => $body,
    //     ];

    //     return $this->repository->update($id, $data);
    // }

    public function update(UpdateSupportDTO $data): stdClass|null
    {
        return $this->repository->update($data);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
