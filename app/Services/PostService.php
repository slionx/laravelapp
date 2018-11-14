<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 15:23
 */

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\CategoryRepository;

class PostService{

    public function __construct(
        PostRepository $postRepository,
        TagRepository $tagRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function store($request)
    {
        //$order = \DB::transaction(function () use ($request) {

            //$request['post_author'] = "Slionx";
            //$request->post_slug = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO
            $result = auth()->user()->posts()->create($request->all());
            if ($result) {
                if(is_array($request->post_tag)) {
                    foreach ($request->post_tag as $tag) {
                        $tags[] = $this->tagRepository->find($tag)->id;
                    }
                    $result->attachTag($tags);
                    $this->updateTagSum($request->post_tag);
                }
                $this->updateCategorySum($request->post_category);

                return $result;
            }
        //});
    }

    public function updateCategorySum($category_id)
    {
        $count = $this->postRepository->findWhere(['post_category' => $category_id])->count();
        $this->categoryRepository->update(['count' => $count], $category_id);
    }

    public function updateTagSum($tags)
    {
        foreach ($tags as $tagid) {
            $result = $this->tagRepository->find($tagid);
            $count = $result->getTagSum();
            $this->tagRepository->update(['count' => $count], $tagid);
        }
    }

}