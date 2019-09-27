<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Session;

class Tag extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'slug',
    ];
    public $timestamps = true;

    public function article()
    {
        return $this->belongsToMany('App\Article', 'article_tag', 'tag_id', 'article_id');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($tag) {
            // mengecek apakah penulis masih punya buku
            if ($tag->article->count() > 0) {
                //menyiapkan pesan error
                $html = 'Tag tidak bisa dihapus karena masih digunakan oleh artikel: ';
                $html .= '<ul>';
                foreach ($tag->article as $data) {
                    $html .= "<li>$data->judul<li>";
                }
                $html .= '<ul>';
                Session::flash("flash_notification", [
                    "level" => "danger",
                    "message" => $html
                ]);
                //membatalkan proses penghapusan
                return false;
            }
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static $logFillable = true;
}
