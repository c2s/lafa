<?php

namespace App\Filesystem;


use ApolloPY\Flysystem\AliyunOss\AliyunOssAdapter as AliyunOssAdapterBase;

/**
 * Aliyun Oss Adapter class.
 *
 * @author  ApolloPY <ApolloPY@Gmail.com>
 */
class AliyunOssAdapter extends AliyunOssAdapterBase
{
    /**
     * 扩展 Aliyun OSS 公共文件访问 URL, 兼容 Storage::url();
     *
     * @param $path
     *
     * @return string
     */
    public function getUrl($path)
    {
        $url = config('filesystems.disks.oss.url') . '/' . $path;
        
        return $url;
    }
}
