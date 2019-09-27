<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Session;

class Category extends Model
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
        return $this->hasMany('App\Article', 'category_id');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($category) {
            // mengecek apakah penulis masih punya buku
            if ($category->article->count() > 0) {
                //menyiapkan pesan error
                $html = 'Kategori tidak bisa dihapus karena masih digunakan oleh artikel: ';
                $html .= '<ul>';
                foreach ($category->article as $data) {
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
