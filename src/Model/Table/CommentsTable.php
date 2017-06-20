<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Articles',['foreignKey'=>'articles_id','joinType'=>'INNER']);
        //記事IDが1つに対してコメントはたくさん付く
        //aeticles_idは記事ID
    }

    public function validationDefault(Validator $validator)
    {
        $validator
        //validator...エラー検地
        //名前　パス　本文を検地する
        //IDは自動で振られる　2個セット　空白検地とかも


            //->notEmpty('articles_id')
            //->requirePresence('articles_id')

            ->notEmpty('body')
            ->requirePresence('body')

            ->notEmpty('name')
            ->requirePresence('name')

            ->notEmpty('pass')
            ->requirePresence('pass');

        return $validator;
    }
}
