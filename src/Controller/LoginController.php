<?php
namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{

    public function index()
    {

    }

    public function login()
    {
        $cookieValue = "1";
        // Cookieに値を保存する
        setcookie("login_key", $cookieValue);
    }

    // public function add()
    // {
    //     $article = $this->Articles->newEntity();
    //     if ($this->request->is('post')) {
    //         $article = $this->Articles->patchEntity($article, $this->request->getData());
    //         if ($this->Articles->save($article)) {
    //             $this->Flash->success(__('Your article has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('Unable to add your article.'));
    //     }
    //     $this->set('article', $article);
    // }

}

?>
