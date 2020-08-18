<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasDateTimeFormatter;

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function updateTopicCount()
    {
        $this->topic_count = $this->topics->count();
        $this->save();
    }

}
