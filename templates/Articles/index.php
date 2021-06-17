<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<style>
.lng{
    background:green;
    color:#FFF;
}
.admn{
    background:yellow;
    color:#000;
}
</style>
<div class="content">
    <h3>Description of problem</h3>
    <p>You can navigate to different pages using to navbar, can change language</p>
    <p>This is basic project followed CMS Tutorial at cakephp4.x website</p>
    <p>It also has Admin prefix/section, and Authentication plugin</p>
    <p>Also internationalization implemented following cakephp4.x documentation</p>
    <p>Current Active language is being saved in Session, while nothing in URL</p>
    <p>Till here all works as expected</p>             
    <p>I want to the language parameter to be appeared in url, as below</p>
    <table>
        <tr>
                    <th>URL</th>
                    <th>Description</th>
        </tr>
        <tr>
                <td>www.domain.com</td>
                <td>Should be redirected to default language parameter, www.domain.com/<span class="lng">en<span></td>
        </tr>
        <tr>
                <td>www.domain.com/<span class="lng">en<span></td>
                <td>www.domain.com/<span class="lng">en<span></td>
        </tr>
        <tr>
                <td>www.domain.com/<span class="lng">ar<span></td>
                <td>www.domain.com/<span class="lng">ar<span></td>
        </tr>
        <tr>
                <td>www.domain.com/<span class="lng">en<span>/*</td>
                <td>www.domain.com/<span class="lng">en<span>/*</td>
        </tr>
        <tr>
                <td>www.domain.com/<span class="lng">ar<span>/*</td>
                <td>www.domain.com/<span class="lng">ar<span>/*</td>
        </tr>
        <tr>
                    <td colspan="2"><b>I am facing issue to set routing for admin prefix INSIDE language parameter as below</b></td>
        </tr>
        
        <tr style="color:red;">
                <td>www.domain.com/<span class="admn">admin<span></td>
                <td>Should be redirected to default language parameter, www.domain.com/<span class="lng">en<span>/<span class="admn">admin<span></td>
        </tr>
        <tr style="color:red;">
                <td>www.domain.com/<span class="lng">en<span>/<span class="admn">admin<span></td>
                <td>www.domain.com/<span class="lng">en<span>/<span class="admn">admin<span></td>
        </tr>
        <tr style="color:red;">
                <td>www.domain.com/<span class="lng">ar<span>/<span class="admn">admin<span></td>
                <td>www.domain.com/<span class="lng">ar<span>/<span class="admn">admin<span></td>
        </tr>
        <tr style="color:red;">
                <td>www.domain.com/<span class="lng">en<span>/<span class="admn">admin<span>/*</td>
                <td>www.domain.com/<span class="lng">en<span>/<span class="admn">admin<span>/*</td>
        </tr>
        <tr style="color:red;">
                <td>www.domain.com/<span class="lng">ar<span>/<span class="admn">admin<span>/*</td>
                <td>www.domain.com/<span class="lng">ar<span>/<span class="admn">admin<span>/*</td>
        </tr>
        
    </table>
</div>
<br>

<div class="articles index content">
    <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Articles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('published') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= $this->Number->format($article->id) ?></td>
                    <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                    <td><?= h($article->title) ?></td>
                    <td><?= h($article->slug) ?></td>
                    <td><?= h($article->published) ?></td>
                    <td><?= h($article->created) ?></td>
                    <td><?= h($article->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<br>