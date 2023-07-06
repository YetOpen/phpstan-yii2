<?php
declare(strict_types=1);

use ErickSkrauch\PHPStan\Yii2\Tests\Yii\Article;
use ErickSkrauch\PHPStan\Yii2\Tests\Yii\Comment;
use ErickSkrauch\PHPStan\Yii2\Tests\Yii\CommentsQuery;
use yii\db\ActiveQuery;
use function PHPStan\Testing\assertType;

assertType(ActiveQuery::class . '<' . Article::class . '>', Article::find());
assertType(CommentsQuery::class . '<' . Comment::class . '>', Comment::find());

$class = Article::class;
assertType(ActiveQuery::class . '<' . Article::class . '>', $class::find());

if (random_int(0, 10) === 0) {
    $class = Comment::class;
}

assertType(CommentsQuery::class . '<' . Comment::class . '>|' . ActiveQuery::class . '<' . Article::class . '>', $class::find());
