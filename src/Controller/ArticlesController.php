<?php

namespace App\Controller;

class ArticlesController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles);
        $this->set(compact('articles'));
    }

    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();

        if($this->request->is('post'))
        {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if($this->Articles->save($article))
            {
                $this->Flash->success("Your article has been saved.");
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to add your article.');
        }

        $this->set(compact('article'));
    }
}