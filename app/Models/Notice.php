<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Notice
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $link
 * @property string|null $date_public
 * @property string|null $author
 * @property string|null $description
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice query()
 * @mixin \Eloquent
 */
class Notice extends Model
{
    use HasFactory;
}
