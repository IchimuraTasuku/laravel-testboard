<?php

namespace App\Http\Controllers;

use App\Models\BulletinBoard;
use Illuminate\Http\Request;
use App\Services\deleteCase;
use App\Services\postingRelatedCase;

class TestController extends Controller
{
    public function newpost()
    {
        return view('newpost');
    }

    public function register(Request $request,BulletinBoard $bulletinBoard,postingRelatedCase $postingRelatedCase)
    {
        // 引数にupdateTitleとupdateContentが存在しているか見る
        $requestTitle = $request->has('updateTitle');
        $requestContent = $request->has('updateContent');
        // updateTitleとupdateContentが存在していなかった (if文のなかにはいる)
        if(!$requestTitle && !$requestContent)
        {
            // 登録処理を呼び出す(request情報を渡す)
            $registCommand = $postingRelatedCase->register($request);

        }else
        {
            // 更新処理を呼び出す(ID,タイトル,本文を渡す)
            $updateCommand = $postingRelatedCase->update($request->id,$request->updateTitle,$request->updateContent,$bulletinBoard);
        }
        // 削除していない最新データを取得
        $posts = $bulletinBoard->getPost();
        //投稿一覧画面を表示(最新の一覧データを渡す)
        return view('register', compact('posts'));
    }

    public function editing(Request $request)
    {
        // 編集対象のIDを取得
        $id = $request->id;
        // 編集画面の表示(遷移時にIDを渡す)
        return view('editing', compact('id'));
    }

    
    public function destroy(Request $request,BulletinBoard $bulletinBoard, deleteCase $deleteCase)
    {
        // 削除Serveceの処理を呼び出す
        $deleteCommand = $deleteCase->deleteCommand($request,$bulletinBoard);

        // 削除していない最新データを取得
        $posts = $bulletinBoard->getPost();
        //投稿一覧画面を表示(最新の一覧データを渡す)
        return view('register', compact('posts'));
    }
    
}
