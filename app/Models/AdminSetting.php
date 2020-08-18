<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'admin_settings';

    protected $fillable = ['name', 'key', 'value'];
}
