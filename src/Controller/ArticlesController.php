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
        $comment = $this->Comments->newEntity();
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
                $this->Flash->success(__('Your comment has been saved.'));
                return $this->redirect(['action' => 'view', $comment->articles_id]);
                //redirect...飛び先 記事一覧
                ///1のところは本来は動的で記事IDを入れるようにする
            }
            //しないなら
            $this->Flash->error(__('Unable to add your article.'));
        }

        //postにデータを保存しないなら？
        $this->set('comment', $comment);
        //editcommentにある$commentと'comment'が
    }

    //コメント編集
    public function editcomment($id = null)
    {
        if ($this->request->is(['post', 'put'])) {
            $comment = $this->Comments->get($id);
            if (isset($_POST['edit'])) {
                $this->Comments->patchEntity($comment, $this->request->data(), ['validate' => false]);
                if(!empty($comment->errors())) {
                     $this->Flash->error('varidation error');
                } else {
                    if ($this->Comments->save($comment)) {
                        $this->Flash->success(__('Your comment has been updated.'));
                        return $this->redirect(['action' => 'view', $comment->articles_id]);
                    }
                    $this->Flash->error(__('Unable to update your comment.'));
                }
            }
            $this->set('comment', $comment);
        }
        else {
            return $this->redirect(['action' => 'index']);
        }
    }//更新された後は記事詳細ページに戻る

    public function deletecomment($id)
    {
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('Your comment has been deleted.'));
            return $this->redirect(['action' => 'view', $comment->articles_id]);
        }
        $this->Flash->error(__('could not delete.'));
    }

    public function check($id = null) {
        if($id == null) {
            $article = $this->Articles->newEntity();

            //file upload------------
            $filename = $this->request->data['upfile']['tmp_name'];
            if (is_uploaded_file($filename)) {
                $kakutyosi = substr(strrchr($this->request->data['upfile']['name'], '.'), 1);
                if (strtolower($kakutyosi) == 'png' || strtolower($kakutyosi) == 'jpg' || strtolower($kakutyosi) === 'jpeg') {
                    $dir = WWW_ROOT . DS . 'img';
                    $upname = time() . ".{$kakutyosi}";
                    move_uploaded_file($filename, $dir . DS . $upname);
                    // $article->upfile = $upname;
                    $this->set('upname', $upname);
                }
                else {
                    $this->Flash->error(__($this->request->data['upfile']['name'] . ' is can not upload.'));
                }
            }
            //----------------------

            $this->set('article', $article);
            $this->set('title', $this->request->data['title']);
            $this->set('body', $this->request->data['body']);
            $this->set('position', $this->request->data['position']);
        }
        else {
            $article = $this->Articles->get($id);
            //file upload-------------
            $filename = $this->request->data['upfile']['tmp_name'];
            if (is_uploaded_file($filename)) {
                $kakutyosi = substr(strrchr($this->request->data['upfile']['name'], '.'), 1);
                if (strtolower($kakutyosi) === 'png' || strtolower($kakutyosi) === 'jpg' || strtolower($kakutyosi) === 'jpeg') {
                    $dir = WWW_ROOT . DS . 'img';
                    $upname = time() . ".{$kakutyosi}";
                    move_uploaded_file($filename, $dir . DS . $upname);
                    // $article->upfile = $upname;
                    $this->set('upname', $upname);
                }
                else {
                    $this->Flash->error(__($this->request->data['upfile']['name'] . ' is can not upload.'));
                }
            }
            //----------------------

            $this->set('article', $article);
            $this->set('title', $this->request->data['title']);
            $this->set('body', $this->request->data['body']);
            $this->set('position', $this->request->data['position']);
            $this->set('id', $article->id);
        }
    }

    public function post($id = null)
    {
        //新規作成の処理
        if($id == null) {
            $article = $this->Articles->newEntity();
            if (isset($_POST['back'])) {
                $article->title =  $this->request->data['title'];
                $article->body =  $this->request->data['body'];
                $this->set('article', $article);
            }
            else {
                if ($this->request->is('post')) {
                    $article = $this->Articles->patchEntity($article, $this->request->getData());
                    // Added this line
                    $article->user_id = $this->Auth->user('id');

                    if ($this->Articles->save($article)) {
                        $this->Flash->success(__('Your article has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Unable to add your article.'));
                }
                $this->set('article', $article);
            }
        }

        //記事編集の処理
        else {
            $article = $this->Articles->get($id);
            // 戻るボタン押下時
            if (isset($_POST['back'])) {
                $article->title =  $this->request->data['title'];
                $article->body =  $this->request->data['body'];
                if (!empty($this->request->data['upfile'])) {
                    $article->upfile =  $this->request->data['upfile'];
                    $article->position =  $this->request->data['position'];
                }
                $this->set('article', $article);
            }
            else {
                if ($this->request->is(['post', 'put'])) {
                    $this->Articles->patchEntity($article, $this->request->getData());
                    //file delete
                    if(!isset($_POST['upfile'])){
                        $article->upfile = $this->request->query('upfile');
                        $article->position = null;
                    }
                    if ($this->Articles->save($article)) {
                        $this->Flash->success(__('Your article has been updated.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Unable to update your article.'));
                }
                $article = $this->Articles->get($id);
                $this->set('article', $article);
            }
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
        if ($this->request->getParam('action') === 'post') {
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
