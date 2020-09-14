<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Course;

class Review extends Model
{
    use SoftDeletes;

    const STAR = [
        'one' => 1,
        'two' => 2,
        'three' => 3,
        'four' => 4,
        'five' => 5
    ];

    const TYPE = [
        'course' => 1,
        'lesson' => 2,
    ];

    protected $fillable = [
        'content', 'rating', 'user_id', 'type', 'target_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLessonRatingCount($star, $lessonId)
    {
        return $this->where('type', self::TYPE['lesson'])
            ->where('rating', $star)
            ->where('target_id', $lessonId)
            ->count();
    }

    public function getRateCount($lessonId)
    {
        return $this->where('type', self::TYPE['lesson'])
            ->where('target_id', $lessonId)
            ->count();
    }

    public function getAvgStarLesson($type, $targetId)
    {
        $avgStar = $this->where('type', $type)
            ->where('target_id', $targetId)
            ->avg('rating');
        return round($avgStar);
    }

    public function getRatingPercent($star, $lessonId)
    {
        if ($this->getRateCount($lessonId) == 0) {
            return $percent = 0;
        } else {
            $percent = $this->getLessonRatingCount($star, $lessonId) / $this->getRateCount($lessonId) * 100 . '%';
            return $percent;
        }
    }

    public function getCourseRatingCount($star, $courseId)
    {
        return $this->where('type', self::TYPE['course'])
            ->where('rating', $star)
            ->where('target_id', $courseId)
            ->count();
    }

    public function getCourseRateCount($courseId)
    {
        return $this->where('type', self::TYPE['course'])
            ->where('target_id', $courseId)
            ->count();
    }

    public function getCourseRatingPercent($star, $courseId)
    {
        if ($this->getCourseRateCount($courseId) == 0) {
            return $percent = 0;
        } else {
            $percent = $this->getCourseRatingCount($star, $courseId) / $this->getCourseRateCount($courseId) * 100 . '%';
            return $percent;
        }
    }
}
