<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-19 18:08
 */

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Api\V1\CaptchaRequest;

/**
 * 验证码控制器
 *
 * Class CaptchasController
 * @package App\Http\Controllers\Api\V1
 */
class CaptchasController extends Controller
{
    /**
     * 创建
     *
     * @param CaptchaRequest $request
     * @return mixed
     */
    public function store(CaptchaRequest $request)
    {
        $key = 'captcha-'.str_random(15);
        $phone = $request->phone;

        $captchaBuilder = new CaptchaBuilder((new PhraseBuilder(5))->build());
        $captchaBuilder->setBackgroundColor(255,255,255);
        $captchaBuilder->setMaxFrontLines(2);
        $captcha = $captchaBuilder->build();
        $expiredAt = now()->addMinutes(3);
        \Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_image_content' => $captcha->inline()
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
