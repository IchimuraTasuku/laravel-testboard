<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BulletinBoard extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'title',
        'comment',
        'updated_at',
        'created_at'
    ];

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'bulletin_board';

    // deleted_atがnullのもの、つまり削除していないデータを取得
    public function getPost()
    {
        // データ取得
        return BulletinBoard::whereNull('deleted_at')->get();
    }

    // idと一致しているデータ取得
    public function getDataMatchingId($targetId)
    {
        return BulletinBoard::where('id', $targetId)->first();
    }

}
