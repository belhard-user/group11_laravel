<?php

namespace App;

use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'short_description', 'description'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getDateAttribute()
    {
        $month = iconv('windows-1251', 'utf-8', $this->updated_at->formatLocalized('%B'));

        $month = $this->prepareMonth($month);

        $dateAndDays = 'в ' . iconv('windows-1251', 'utf-8', $this->updated_at->formatLocalized('%A %d'));
        $year = date('Y') . ' года';
        // iconv('windows-1251', 'utf-8', $article->updated_at->formatLocalized('%A %d %B %Y')) года
        return sprintf(
            '%s %s %s',
            $dateAndDays,
            $month,
            $year
        );
    }

    private function prepareMonth($month)
    {
        $month = mb_strtolower($month);

        $mon = [
          'январь' => 'января',
          'февраль' => 'февраля',
          'март' => 'марта',
          'апрель' => 'апреля',
          'май' => 'мая',
          'июнь' => 'июня',
          'июль' => 'июля',
          'август' => 'августа',
          'сентябрь' => 'сентября',
          'октябрь' => 'октября',
          'ноябрь' => 'ноября',
          'декабрь' => 'декабря',
        ];

        return array_get($mon, $month, $month);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTagListAttribute()
    {
        return $this->tags->pluck('id')->toArray();
    }
}
