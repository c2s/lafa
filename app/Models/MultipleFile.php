<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use Illuminate\Support\Facades\Storage;

/**
 * 分类模型
 *
 * Class Category
 * @package App\Models
 */
class MultipleFile extends Model
{
    protected $table = 'multiple_files';
    protected $fillable = [
        'id',
        'multiple_file_table_id',
        'multiple_file_table_type',
        'field',
        'order',
        'path',
        ];

    public function multiple_file_table(){
        return $this->morphTo();
    }

    public function file()
    {
        return $this->hasOne('App\Models\File', 'path', 'path');
    }

    public function toArray()
    {
        $array = [
            'id'        => $this->id,
            'field'     => $this->field,
            'order'     => $this->order,
            'path'      => $this->path,

            'name'     => $this->file->title,
            'folder'    => $this->file->folder,
            'size'      => $this->file->size,
            'origSize'  => $this->file->size,
            'type'      => $this->file->mime_type,
        ];

        if($this->file->type == 'image'){
            $array['previewImage']  = $array['url'] = storage_image_url($this->path);
        }else{
            $array['url'] = storage_url($this->path);
        }

        return $array;
    }

}
