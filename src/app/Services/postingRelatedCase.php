<?php

namespace App\Services;

use App\Models\BulletinBoard;

class postingRelatedCase
{
    public function register($request)
    {
        // 初期化
        $bulletinBoard = new BulletinBoard();
        // それぞれのカラムに引数で受け取った値を入れる
        $bulletinBoard->title = $request->title;
        $bulletinBoard->comment = $request->content;
        // 投稿内容の保存
        $bulletinBoard->save();
    }

    public function update($id, $title, $comment,$bulletinBoard)
    {
        $updateData = $bulletinBoard->getDataMatchingId($id);
        // それぞれのカラムに引数で受け取った値を入れる
        $updateData->title = $title;
        $updateData->comment = $comment;
        // 編集した内容を更新
        $updateData->update();
        $posts = $bulletinBoard->getPost();
        return $posts;
    }
}