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
use App\Models\User;

/**
 * 调试 API 辅助工具 - 快速生成用户 Token
 *
 * Class GenerateToken
 * @package App\Console\Commands
 */
class GenerateToken extends Command
{
    protected $signature = 'Lafa:generate-token';

    protected $description = '快速为用户生成 token';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userId = $this->ask('输入用户 id');

        $user = User::find($userId);

        if (!$user) {
            return $this->error('用户不存在');
        }

        // 一年以后过期
        $ttl = 365*24*60;
        $this->info(\Auth::guard('api')->setTTL($ttl)->fromUser($user));
    }
}
