<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-12-18 21:26
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * 清理垃圾分片，因为网络中断导致的垃圾分片
 *
 * Class SyncBlock
 * @package App\Console\Commands
 */
class Uploader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Lafa:uploader';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up uploader rubbish chunk.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Clean up uploader rubbish chunk.");

        // 获取本地磁盘实例
        $storage = Storage::disk('local');

        // 构建分片目录
        $chunks_directory = "chunks";

        // 获取分片目录下得所有目录
        $directories = $storage->directories($chunks_directory);
        $timestamp = time();

        foreach ($directories as $directory){
            $lastModified = $storage->lastModified($chunks_directory . '/'. $directory);
            if( ($lastModified + 86400) < $timestamp ){
                // 24 小时以前的垃圾分片，直接删除
                $storage->deleteDirectory($chunks_directory . '/'. $directory);
            }
        }

        $this->info("Clean up uploader rubbish chunk complete.");
    }
}
