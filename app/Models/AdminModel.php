<?php
/**
 * Created by PhpStorm.
 * User: naseq
 * Date: 04/02/2020
 * Time: 15:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}