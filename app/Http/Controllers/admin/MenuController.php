<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository as Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	public function __construct( Menu $menu ) {
		$this->menu = $menu;
	}

    public function index(){

        $result = $this->menu->orderBy('weights','desc')->findWhere(['status' => 1])->toarray();

        $a = $this->sortMenuSetCache($result);
        dd($a);
        //return view('admin.menu.index', compact('result'));
    }
    public function show(){
        //$menu = new Menu;
        $result = Menu::all();
        return view('admin.menu.index', compact('result'));
        //return view('admin.menu');
    }

	public function create() {
		return view( 'admin.menu.create' );
	}


    public function getList1()
    {
        $menu_list = [
            [
                'name' => '商城管理',
                'route' => 'mch/store/wechat-setting',
                'icon' => 'icon-setup',
                'list' => [
                    [
                        'name' => '系统设置',
                        'route' => 'mch/store/wechat-setting',
                        'list' => [
                            [
                                'name' => '微信配置',
                                'route' => 'mch/store/wechat-setting',
                            ],
                            [
                                'name' => '商城设置',
                                'route' => 'mch/store/setting',
                            ],
                            [
                                'name' => '模板消息',
                                'route' => 'mch/store/tpl-msg',
                            ],
                            [
                                'name' => '短信通知',
                                'route' => 'mch/store/sms',
                            ],
                            [
                                'name' => '邮件通知',
                                'route' => 'mch/store/mail',
                            ],
                            [
                                'name' => '运费规则',
                                'route' => 'mch/store/postage-rules',
                                'sub' => [
                                    'mch/store/postage-rules-edit'
                                ],
                            ],
                            [
                                'name' => '快递单打印',
                                'route' => 'mch/store/express',
                                'sub' => [
                                    'mch/store/express-edit',
                                ],
                            ],
                            [
                                'name' => '小票打印',
                                'route' => 'mch/printer/list',
                                'sub' => [
                                    'mch/printer/setting',
                                    'mch/printer/edit',
                                ],
                            ],
//                            [
//                                'name' => '模板',
//                                'route' => 'mch/test/tpl',
//                            ],
                            [
                                'name' => '上传设置',
                                'route' => 'mch/store/upload',
                            ],
                            [
                                'name' => '缓存',
                                'route' => 'mch/cache/index',
                            ],
                        ],
                    ],
                    [
                        'name' => '小程序设置',
                        'route' => 'mch/store/slide',
                        'list' => [
                            [
                                'name' => '轮播图',
                                'route' => 'mch/store/slide',
                                'sub' => [
                                    'mch/store/slide-edit',
                                ],
                            ],
                            [
                                'name' => '导航图标',
                                'route' => 'mch/store/home-nav',
                                'sub' => [
                                    'mch/store/home-nav-edit',
                                ],
                            ],
                            [
                                'name' => '图片魔方',
                                'route' => 'mch/store/home-block',
                                'sub' => [
                                    'mch/store/home-block-edit',
                                ],
                            ],
                            [
                                'name' => '导航栏',
                                'route' => 'mch/store/navbar',
                            ],
                            [
                                'name' => '首页布局',
                                'route' => 'mch/store/home-page',
                            ],
                            [
                                'name' => '用户中心',
                                'route' => 'mch/store/user-center',
                            ],
                            [
                                'name' => '下单表单',
                                'route' => 'mch/store/form',
                            ],
                            [
                                'name' => '小程序发布',
                                'route' => 'mch/store/wxapp',
                            ],
                        ],
                    ],

                ],
            ],
            [
                'name' => '商品管理',
                'route' => 'mch/goods/goods',
                'icon' => 'icon-service',
                'list' => [
                    [
                        'name' => '商品管理',
                        'route' => 'mch/goods/goods',
                        'sub' => [
                            'mch/goods/goods-edit',
                        ],
                    ],
                    [
                        'name' => '分类',
                        'route' => 'mch/store/cat',
                        'sub' => [
                            'mch/store/cat-edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => '订单管理',
                'route' => 'mch/order/index',
                'icon' => 'icon-activity',
                'list' => [
                    [
                        'name' => '订单列表',
                        'route' => 'mch/order/index',
                        'sub' => [
                            'mch/order/detail'
                        ]
                    ],
                    [
                        'name' => '自提订单',
                        'route' => 'mch/order/offline',
                    ],
                    [
                        'name' => '售后订单',
                        'route' => 'mch/order/refund',
                    ],
                    [
                        'name' => '评价管理',
                        'route' => 'mch/comment/index',
                    ],
                ],
            ],
            [
                'name' => '用户管理',
                'route' => 'mch/user/index',
                'icon' => 'icon-people',
                'list' => [
                    [
                        'name' => '用户列表',
                        'route' => 'mch/user/index',
                        'sub' => [
                            'mch/user/card',
                            'mch/user/coupon',
                            'mch/user/rechange-log',
                            'mch/user/edit',
                        ],
                    ],
                    [
                        'name' => '核销员',
                        'route' => 'mch/user/clerk',
                    ],
                    [
                        'name' => '会员等级',
                        'route' => 'mch/user/level',
                        'sub' => [
                            'mch/user/level-edit',
                        ]
                    ],
                ],
            ],
            [
                'id' => 'share',
                'name' => '分销中心',
                'route' => 'mch/share/index',
                'icon' => 'icon-jiegou',
                'list' => [
                    [
                        'name' => '分销商',
                        'route' => 'mch/share/index',
                    ],
                    [
                        'name' => '分销订单',
                        'route' => 'mch/share/order',
                    ],
                    [
                        'name' => '分销提现',
                        'route' => 'mch/share/cash',
                    ],
                    [
                        'name' => '分销设置',
                        'route' => 'mch/share/basic',
                        'list' => [
                            [
                                'name' => '基础设置',
                                'route' => 'mch/share/basic',
                                'sub' => [
                                    'mch/share/qrcode'
                                ]
                            ],
                            [
                                'name' => '佣金设置',
                                'route' => 'mch/share/setting'
                            ]
                        ]
                    ],
                ],
            ],
            [
                'name' => '内容管理',
                'route' => 'mch/article/index',
                'icon' => 'icon-barrage',
                'list' => [
                    [
                        'name' => '文章',
                        'route' => 'mch/article/index',
                        'sub' => [
                            'mch/article/edit',
                        ],
                    ],
                    [
                        'id' => 'topic',
                        'name' => '专题',
                        'route' => 'mch/topic/index',
                        'sub' => [
                            'mch/topic/edit',
                        ],
                    ],
                    [
                        'id' => 'video',
                        'name' => '视频',
                        'route' => 'mch/store/video',
                        'sub' => [
                            'mch/store/video-edit',
                        ],
                    ],
                    [
                        'name' => '门店',
                        'route' => 'mch/store/shop',
                        'sub' => [
                            'mch/store/shop-edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => '营销管理',
                'route' => 'mch/coupon/index',
                'icon' => 'icon-coupons',
                'list' => [
                    [
                        'id' => 'coupon',
                        'name' => '优惠券',
                        'route' => 'mch/coupon/index',
                        'sub' => [
                            'mch/coupon/send',
                            'mch/coupon/edit',
                        ],
                        'list' => [
                            [
                                'name' => '优惠券管理',
                                'route' => 'mch/coupon/index'
                            ],
                            [
                                'name' => '自动发放设置',
                                'route' => 'mch/coupon/auto-send',
                                'sub' => [
                                    'mch/coupon/auto-send-edit'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => '卡券',
                        'route' => 'mch/card/index',
                        'sub' => [
                            'mch/card/edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => '应用专区',
                'route' => 'mch/seckill/index',
                'icon' => 'icon-pintu-m',
                'list' => [
                    [
                        'id' => 'seckill',
                        'name' => '整点秒杀',
                        'route' => 'mch/seckill/index',
                        'list' => [
                            [
                                'name' => '开放时间',
                                'route' => 'mch/seckill/index',
                            ],
                            [
                                'name' => '商品设置',
                                'route' => 'mch/seckill/goods',
                                'sub' => [
                                    'mch/seckill/goods-edit',
                                    'mch/seckill/goods-detail',
                                    'mch/seckill/calendar',
                                ],
                            ],
                        ],
                    ],
                    [
                        'id' => 'pintuan',
                        'name' => '拼团管理',
                        'route' => 'mch/group/goods/index',
                        'list' => [
                            [
                                'name' => '商品管理',
                                'route' => 'mch/group/goods/index',
                                'sub' => [
                                    'mch/group/goods/goods-edit',
                                    'mch/group/goods/goods-attr'
                                ]
                            ],
                            [
                                'name' => '商品分类',
                                'route' => 'mch/group/goods/cat',
                                'sub' => [
                                    'mch/group/goods/cat-edit'
                                ]
                            ],
                            [
                                'name' => '订单管理',
                                'route' => 'mch/group/order/index',
                            ],
                            [
                                'name' => '拼团管理',
                                'route' => 'mch/group/order/group',
                                'sub' => [
                                    'mch/group/order/group-list'
                                ]
                            ],
                            [
                                'name' => '轮播图',
                                'route' => 'mch/group/pt/banner',
                                'sub' => [
                                    'mch/group/pt/slide-edit'
                                ]
                            ],
                            [
                                'name' => '模板消息',
                                'route' => 'mch/group/notice/setting',
                            ],
                            [
                                'name' => '拼团规则',
                                'route' => 'mch/group/article/edit',
                            ],
                            [
                                'name' => '评论管理',
                                'route' => 'mch/group/comment/index',
                            ],
                            [
                                'name' => '广告设置',
                                'route' => 'mch/group/ad/setting',
                            ],
                            [
                                'name' => '数据统计',
                                'route' => 'mch/group/data/goods',
                                'sub' => [
                                    'mch/group/data/user'
                                ]
                            ],
                        ],
                    ],
                    [
                        'id' => 'book',
                        'name' => '预约管理',
                        'route' => 'mch/book/goods/index',
                        'list' => [
                            [
                                'name' => '商品管理',
                                'route' => 'mch/book/goods/index',
                                'sub' => [
                                    'mch/book/goods/goods-edit'
                                ]
                            ],
                            [
                                'name' => '商品分类',
                                'route' => 'mch/book/goods/cat',
                                'sub' => [
                                    'mch/book/goods/cat-edit'
                                ]
                            ],
                            [
                                'name' => '订单管理',
                                'route' => 'mch/book/order/index',
                            ],
                            [
                                'name' => '基础设置',
                                'route' => 'mch/book/index/setting',
                            ],
                            [
                                'name' => '模板消息',
                                'route' => 'mch/book/notice/setting',
                            ],
                            [
                                'name' => '评论管理',
                                'route' => 'mch/book/comment/index',
                            ],
                        ],
                    ],
                ],
            ],

        ];

        $menu_list = $this->resetList($menu_list);
        foreach ($menu_list as $i => $item) {
            if (is_array($item['list']) && count($item['list']) == 0) {
                unset($menu_list[$i]);
                continue;
            }
            if (is_array($item['list'])) {
                $menu_list[$i]['route'] = $item['list'][0]['route'];
            }
        }
        $menu_list = array_values($menu_list);

        return $menu_list;

    }


    private function getList()
    {
        $menu_list = [
            [
                'name' => '仪表盘',
                'route' => 'dashboard/index',
                'icon' => 'fa fa-dashboard',
                'list' => [
                    [
                        'name' => '仪表盘',
                        'route' => 'dashboard/index',
                        'icon' => 'icon-bar-chart',
                    ],
                ],
            ],
            [
                'name' => '文章管理',
                'route' => 'post/index',
                'icon' => 'fa fa-navicon',
                'list' => [
                    [
                        'name' => '文章列表',
                        'route' => 'post/index',
                        'icon' => 'fa fa-navicon',
                        'sub' => [
                            'mch/store/cat-edit',
                        ],
                    ],
                    [
                        'name' => '添加文章',
                        'route' => 'post/create',
                        'sub' => [
                            'mch/goods/goods-edit',
                        ],
                    ],
                ],
            ],
        ];

        $menu_list = $this->resetList($menu_list);
        foreach ($menu_list as $i => $item) {
            if (is_array($item['list']) && count($item['list']) == 0) {
                unset($menu_list[$i]);
                continue;
            }
            if (is_array($item['list'])) {
                $menu_list[$i]['route'] = $item['list'][0]['route'];
            }
        }
        $menu_list = array_values($menu_list);

        return $menu_list;

    }


    /**
     * 获取当前二级菜单列表
     * @param $menu_list
     * @param $route
     * @return null
     */
    function getCurrentMenu($menu_list, $route)
    {
        foreach ($menu_list as $item) {
            if (isset($item['route']) && ($item['route'] == $route || (isset($item['sub']) && is_array($item['sub']) && in_array($route, $item['sub'])))) {
                return $item;
            }
            if (isset($item['list']) && is_array($item['list'])) {
                foreach ($item['list'] as $sub_item) {
                    if (isset($sub_item['route']) && ($sub_item['route'] == $route || (isset($sub_item['sub']) && is_array($sub_item['sub']) && in_array($route, $sub_item['sub']))))
                        return $item;
                    if (isset($sub_item['list']) && is_array($sub_item['list'])) {
                        foreach ($sub_item['list'] as $sub_sub_item) {
                            if (isset($sub_sub_item['route']) && ($sub_sub_item['route'] == $route || (isset($sub_sub_item['sub']) && is_array($sub_sub_item['sub']) && in_array($route, $sub_sub_item['sub']))))
                                return $item;
                        }
                    }
                }
            }
        }
        return null;
    }

    private function resetList($list)
    {
        foreach ($list as $i => $item) {
            if (isset($item['id']) && $this->user_auth !== null && !in_array($item['id'], $this->user_auth)) {
                unset($list[$i]);
                continue;
            }
            if (isset($item['list']) && is_array($item['list'])) {
                $list[$i]['list'] = $this->resetList($item['list']);
            }
        }
        $list = array_values($list);
        return $list;
    }











    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'menu_name' => 'bail|required',
            'display_name' => 'bail|required|unique:menu|max:255',
            'parentid' => 'bail|required|numeric',
            'icon' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
	    $result = $this->menu->create($request->all());
	    if($result){
		    return Redirect('admin/menu')->with('success', '分类 ' . $request['name'] . ' 创建成功');
	    }else{
		    return Redirect('admin/menu/create')->withErrors('分类 ' . $request['name'] . ' 创建失败');
	    }

    }
    public function edit($id){
    	$menu = $this->menu->find($id);
        return view('admin.menu.edit',compact('menu'));
    }
    public function update(Request $request , $id){

	    $validator = Validator::make($request->all(), [
		    'menu_name' => 'bail|required',
		    'display_name' => 'bail|required|unique:menu|max:255',
		    'parentid' => 'bail|required|numeric',
		    'icon' => 'required',
	    ]);
	    if ($validator->fails()) {
		    return back()
			    ->withErrors($validator)
			    ->withInput($request->all());
	    }
	    $result = $this->menu->update($request->all(),$id);
	    if($result){
		    return Redirect('admin/menu')->with('success', '分类 ' . $request['name'] . ' 修改成功');
	    }else{
		    return Redirect('admin/menu/edit')->withErrors('分类 ' . $request['name'] . '修改失败');
	    }

    }
    public function destroy($id){
	    try {
		    $result = $this->menu->delete($id);
		    if($result){
			    return redirect()->route('menu.index')->with('success', '删除成功！');
		    }else{
			    return redirect()->route('menu.index')->with('error', '删除失败！');
		    }
	    } catch (Exception $e) {
		    return redirect()->route('menu.index')->with('error', '删除失败！'.$e->getMessage());
	    }
    }
}
