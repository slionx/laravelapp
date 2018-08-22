<?php

namespace App\Http\ViewComposers;


use Illuminate\View\View;
use App\Repositories\MenuRepository;

/**
 * Class AdminComposer
 * @package App\Http\ViewComposers
 */
class AdminComposer {

    /**
     * AdminComposer constructor.
     *
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository) {
        $this->menuRepository = $menuRepository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $menulist = $this->menuRepository->getMenuList();

        $view->with('menulist',$menulist);
    }

}