<?php
namespace App\Repository\Branch;


use App\Model\Branch;


class BranchRepository implements BranchRepositoryInterface
{
    public function getallbranch()
    {
        return Branch::all();
    }

    public function createbranch()
    {
        $branches = new Branch();

        return $branches;
    }

    public function findbranch($id)
    {
        return Branch::find($id);
    }
}

