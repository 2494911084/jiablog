<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Label extends Model
{
    use HasDateTimeFormatter;

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class, 'label_topics', 'label_id', 'topic_id');
    }
}
