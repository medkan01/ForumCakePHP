<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created at <?= $article->created->format(DATE_RFC850) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></p>