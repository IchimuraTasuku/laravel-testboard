<?php

namespace App\Services;

use App\Models\BulletinBoard;

class deleteCase
{
    public function deleteCommand($request,BulletinBoard $bulletinBoard)
    {
        // 削除対象のデータの取得
        $deleteTarget = $bulletinBoard->getDataMatchingId($request->id);
        // 削除対象データが存在する場合
        if($deleteTarget)
        {
            // データを削除
          return  $deleteTarget->delete();
        }

        // データが存在しない場合はfalseを返す
        return false;
    }
}