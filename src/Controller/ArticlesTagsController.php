<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ArticlesTags Controller
 *
 * @property \App\Model\Table\ArticlesTagsTable $ArticlesTags
 * @method \App\Model\Entity\ArticlesTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesTagsController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index', 'view', 'add','edit','delete']);
       
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Tags'],
        ];
        $articlesTags = $this->paginate($this->ArticlesTags);

        $this->set(compact('articlesTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesTag = $this->ArticlesTags->get($id, [
            'contain' => ['Articles', 'Tags'],
        ]);

        $this->set(compact('articlesTag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesTag = $this->ArticlesTags->newEmptyEntity();
        if ($this->request->is('post')) {
            $articlesTag = $this->ArticlesTags->patchEntity($articlesTag, $this->request->getData());
            if ($this->ArticlesTags->save($articlesTag)) {
                $this->Flash->success(__('The articles tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles tag could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesTags->Articles->find('list', ['limit' => 200]);
        $tags = $this->ArticlesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlesTag', 'articles', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesTag = $this->ArticlesTags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesTag = $this->ArticlesTags->patchEntity($articlesTag, $this->request->getData());
            if ($this->ArticlesTags->save($articlesTag)) {
                $this->Flash->success(__('The articles tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles tag could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesTags->Articles->find('list', ['limit' => 200]);
        $tags = $this->ArticlesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlesTag', 'articles', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesTag = $this->ArticlesTags->get($id);
        if ($this->ArticlesTags->delete($articlesTag)) {
            $this->Flash->success(__('The articles tag has been deleted.'));
        } else {
            $this->Flash->error(__('The articles tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
