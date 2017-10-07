<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;

class FileTranslation extends Model
{
  protected $primaryKey="ID";
 
    public $timestamps = false;
    protected $fillable = ['DESCRIPTION', 'ALT_ATTRIBUTE', 'KEYWORDS'];
    protected $table = 'media_file_translations';
}
