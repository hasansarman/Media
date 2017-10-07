<?php

namespace Modules\Media\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\NamespacedEntity;
use Modules\Media\Helpers\FileHelper;
use Modules\Media\Image\Facade\Imagy;
use Modules\Media\ValueObjects\MediaPath;
use Modules\Tag\Contracts\TaggableInterface;
use Modules\Tag\Traits\TaggableTrait;

/**
 * Class File
 * @package Modules\Media\Entities
 * @property \Modules\Media\ValueObjects\MediaPath path
 */
class File extends Model implements TaggableInterface
{
    use Translatable, NamespacedEntity, TaggableTrait;
    /**
     * All the different images types where thumbnails should be created
     * @var array
     */
     protected $primaryKey="ID";
     const CREATED_AT = 'IDATE';
     const UPDATED_AT = 'UDATE';
    private $imageExtensions = ['jpg', 'png', 'jpeg', 'gif'];

    protected $table = 'media_files';
    public $translatedAttributes = ['DESCRIPTION', 'ALT_ATTRIBUTE', 'KEYWORDS'];
    protected $fillable = [
        'DESCRIPTION',
        'ALT_ATTRIBUTE',
        'KEYWORDS',
        'FILENAME',
        'PATH',
        'EXTENSION',
        'MIMETYPE',
        'WIDTH',
        'HEIGHT',
        'FILESIZE',
        'FOLDER_ID',
    ];
    protected $appends = ['PATH_STRING', 'MEDIA_TYPE'];
    protected static $entityNamespace = 'asgardcms/media';

    public function getPathAttribute($value)
    {
        return new MediaPath($value);
    }

    public function getPathStringAttribute()
    {
        return (string) $this->PATH;
    }

    public function getMediaTypeAttribute()
    {
        return FileHelper::getTypeByMimetype($this->MIMETYPE);
    }

    public function isImage()
    {
        return in_array(pathinfo($this->PATH, PATHINFO_EXTENSION), $this->imageExtensions);
    }

    public function getThumbnail($type)
    {
        if ($this->isImage() && $this->getKey()) {
            return Imagy::getThumbnail($this->PATH, $type);
        }

        return false;
    }
}
