<?php

namespace App\Http\Controllers;

use App\Models\BulletinBoard;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function newpost()
    {
        return view('newpost');
    }

    public function register(Request $request)
    {
        // 引数にupdateTitleとupdateContentがそんざいしているか見る
        $requestTitle = $request->has('updateTitle');
        $requestContent = $request->has('updateContent');
        // updateTitleとupdateContentが存在していなかった (if文のなかにはいる)
        if(!$requestTitle && !$requestContent)
        {
            $bulletinBoard = new BulletinBoard();
            $bulletinBoard->title = $request->title;
            $bulletinBoard->comment = $request->content;
            // 投稿内容の保存
            $bulletinBoard->save();
            // 投稿内容の取得
            $posts = $bulletinBoard->getPost();
            return view('register', compact('posts'));
        }

        // if文終わり
        // updateメソッドを呼び出す(このときid, updateTitle, updateContentを渡してあげる)
        $posts = self::update($request->id,$request->updateTitle,$request->updateContent);
        return view('register', compact('posts'));
    }

    public function editing(Request $request)
    {
        $id = $request->id;
        return view('editing', compact('id'));
    }

    public function destroy(Request $request)
    {
        $bulletinBoard = new BulletinBoard();
        $deleteTarget = $bulletinBoard->getDataMatchingId($request->id);
        $posts = $bulletinBoard->getPost();
        return view('register', compact('posts'));
    }

    private function update($id, $title, $comment)
    {
        // idと一致しているデータをDB取得
        $bulletinBoard = new BulletinBoard();
        $updateData = $bulletinBoard->getDataMatchingId($id);
        // それぞれのカラムに引数で受け取った値を入れる(以下を参考に)
        $updateData->title = $title;
        $updateData->comment = $comment;
        // 編集した内容を更新
        $updateData->update();
        $posts = $bulletinBoard->getPost();
        return $posts;
    }

}
