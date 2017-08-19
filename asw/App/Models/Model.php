<?php

namespace App\Models;

use App\Models\database\orm\Orm;
use App\Traits\DB;

class Model extends Orm
{
    use DB;
}