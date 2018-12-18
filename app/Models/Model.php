<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Models\Traits\WithOrderHelper;
use App\Models\Traits\WithMultipleFilesTraits;

class Model extends EloquentModel
{
    use WithOrderHelper;
    use WithMultipleFilesTraits;


}
