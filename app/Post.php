<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;
use Boye\Support\FilterPaginateOrder;

class Post extends Model
{
	use FilterPaginateOrder;
    protected $fillable = ['category_id', 'user_id','title','content','image','slug'];

     /* Whitelist of filter-able columns*/
    protected $filter = ['id', 'company', 'email', 'name'];
}
