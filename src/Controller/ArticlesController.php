<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadModel('Comments');//ComenntsTable.php
    }

    public function index()
    {
        $this->set('articles', $this->Articles->find('all'));
    }

    public function view($id)
    {
        //$article = $this->Articles->get($id);
        $article = $this->Articles->find('all')
        //find('all')は配列で結果を返します
        //全部の情報を返すけどidと同じもので最初のものをarticleに入れる
        ->contain(['Comments'])
        ->where(['id'=>$id])
        ->first();
        //var_dump($article);
        //$articleにコメント情報が入ってくる

        $this->set(compact('article'));
        //setでarticleという変数を作っている
    }

    //コメント追加
    public function addcomment()
    {
        $comment= $this->Comments->newEntity();
        //CommentsはCommentsTable.phpのことを指す

        //postデータを保存する
        if ($this->request->is('post')) {

            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            //patchEntityは更新処理
            $this->log($comment);
            //var_dump($comment);

            //保存する
            if ($this->Comments->save($comment)) {
                //saveする
                //メッセージを表示
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'view',1]);
                //redirect...飛び先 記事一覧
                ///1のところは本来は動的で記事IDを入れるようにする
            }
            //しないなら
            $this->Flash->error(__('Unable to add your article.'));
        }

        //postにデータを保存しないなら？
        $this->set('comment', $comment);
    }


    //コメント編集
    public function commentedit()
    {
        $commment = $this->Comments->get($id);
        //for(あるだけ){
            if ($this->request->is(['post', 'put'])) {
                $this->Comments->patchEntity($article, $this->request->getData());
                if ($this->Comments->save($comment)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'view',1]);
                }
                $this->Flash->error(__('Unable to update your article.'));
            }

            $this->set('comment', $comment);
        //}
    }

    public function add($id = null)
    {
        //新規作成の処理
        if($id == null)
        {
            $article = $this->Articles->newEntity();
            if ($this->request->is('post')) {
                $article = $this->Articles->patchEntity($article, $this->request->getData());
                // Added this line
                $article->user_id = $this->Auth->user('id');
                // You could also do the following
                //$newData = ['user_id' => $this->Auth->user('id')];
                //$article = $this->Articles->patchEntity($article, $newData);
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to add your article.'));
            }
            $this->set('article', $article);

            // Just added the categories list to be able to choose
            // one category for an article
            $categories = $this->Articles->Categories->find('treeList');
            $this->set(compact('categories'));
        }
        //記事編集の処理
        else {
            $article = $this->Articles->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->getData());
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your article.'));
            }

            $this->set('article', $article);
        }
    }


    // public function edit($id = null)
    // {
    //     $article = $this->Articles->get($id);
    //     if ($this->request->is(['post', 'put'])) {
    //         $this->Articles->patchEntity($article, $this->request->getData());
    //         if ($this->Articles->save($article)) {
    //             $this->Flash->success(__('Your article has been updated.'));
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('Unable to update your article.'));
    //     }
    //
    //     $this->set('article', $article);
    // }


    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $articleId = (int)$this->request->getParam('pass.0');
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}


?>
