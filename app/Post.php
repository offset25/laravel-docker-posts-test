<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use SoftDeletes;	
	use Sortable;
	protected $fillable = ['name','title','content'];
	public $sortable = ['name','title','content'];
}
