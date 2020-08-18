<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topic extends Model
{
    use HasDateTimeFormatter;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function labels(): BelongsToMany
    {
        $pivotTable = 'label_topics'; // 中间表

        $relatedModel = Label::class; // 关联模型类名

        return $this->belongsToMany($relatedModel, $pivotTable, 'topic_id', 'label_id');
    }
}
