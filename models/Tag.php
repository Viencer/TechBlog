<?php

namespace app\models;
use yii\data\Pagination;
use \yii\db\Query;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property ArticleTag[] $articleTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[ArticleTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['id' => 'article_id'])
            ->viaTable('article_tag', ['tag_id' => 'id']);
    }

    public static function getAll() {
     return Tag::find()->all(); 
    }

    public function getArticlesCount() {
        return $this->getArticles()->count();
    }

    public static function getArticleByTag($id) {

    $query = Article::find()->
       from(['article ar'])->
       leftJoin('article_tag tg', 'tg.article_id = ar.id')->
       where(['tg.tag_id' => $id]);

       $count = $query->count();

       $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>6]);

       // limit the query using the pagination and retrieve the articles
       $articles = $query->offset($pagination->offset)
       ->limit($pagination->limit) //limit from database
       ->all();
       $data['articles']=$articles;
       $data['pagination']=$pagination;
       
       return $data;
    }
}
