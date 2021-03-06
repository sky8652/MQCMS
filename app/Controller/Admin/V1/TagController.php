<?php
declare(strict_types=1);

namespace App\Controller\Admin\V1;

use App\Logic\Admin\TagLogic;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use App\Middleware\AuthMiddleware;

/**
 * @Controller()
 * @Middleware(AuthMiddleware::class)
 * Class TagController
 * @package App\Controller\Admin\V1
 */
class TagController extends BaseController
{
    /**
     *
     * @Inject()
     * @var TagLogic
     */
    public $logic;

    /**
     * @RequestMapping(path="store", methods="post")
     * @param RequestInterface $request
     * @return int
     */
    public function store(RequestInterface $request)
    {
        $this->validateParam($request, [
            'tag_name' => 'required',
            'is_hot' => 'required|integer',
            'status' => 'required',
        ]);
        return $this->logic->store($request);
    }

    /**
     * @RequestMapping(path="update", methods="post")
     * @param RequestInterface $request
     * @return int
     */
    public function update(RequestInterface $request)
    {
        $this->validateParam($request, [
            'id' => 'required',
            'tag_name' => 'required'
        ]);
        return $this->logic->update($request);
    }
}