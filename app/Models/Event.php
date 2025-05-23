<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    /**
     * ステータス（状態）定義
     * 
     */
    const STATUS = [
        1 => [ 'label' => '募集中', 'class' => 'label-danger' ],
        2 => [ 'label' => '募集終了', 'class' => 'label-info' ],
        3 => [ 'label' => '開催決定', 'class' => '' ],
    ];

    /**
     * ステータス（状態）ラベルのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

        /**
     * 状態を表すHTMLクラスのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    /**
     * 整形した期限日のアクセサメソッド
     * 
     * @return string
     */
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['start_date'])
            ->format('Y/m/d');
    }
}
