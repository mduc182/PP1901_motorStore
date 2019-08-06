<?php
namespace App\Repository\Branch;

interface BranchRepositoryInterface
{
  public function getallbranch();
  public function findbranch($id);
  public function createbranch();
}
