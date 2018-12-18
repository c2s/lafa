<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-11-7 19:24
 */

namespace App\Handlers;

use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;
use TeamTNT\TNTSearch\Support\TokenizerInterface;

/**
 * 全文索引集成中文分词服务
 *
 * Class TokenizerHandler
 * @package App\Handlers
 */
class TokenizerHandler implements TokenizerInterface
{
    public function __construct(array $options = [])
    {
        Jieba::init($options);
        Finalseg::init($options);
    }

    public function tokenize($text, $stopwords = [])
    {
        return is_numeric($text) ? [] : $this->getTokens($text, $stopwords);
    }

    public function getTokens($text, $stopwords = [])
    {
        $split = Jieba::cutForSearch($text);
        return $split;
    }
}
