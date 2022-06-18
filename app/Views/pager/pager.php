<?php

//use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(1);

//getFirstPageNumber() & getLastPageNumber()
//getPreviousPageNumber() & getNextPageNumber()
?>




<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="page-item" >
				<a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" title="<?=current_url()?>/<?= $pager->getFirstPageNumber() ?>">
					<span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li class="page-item" >
				<a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" title="<?=current_url()?>/<?= $pager->getPreviousPageNumber() ?>">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php else : ?>
			<li class="page-item" >
				<button class="bg-light page-link" type="button" disabled aria-label="No First" title="No First">
					<span class="text-muted" aria-hidden="true"><?= lang('Pager.first') ?></span>
				</button>
			</li>
			<li class="page-item" >
				<button class="bg-light page-link" type="button" disabled aria-label="No Previous" title="No Previous">
					<span class="text-muted" aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</button>
			</li>
		<?php endif ?>

	<?php if($pager->links()) : ?>
		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="page-item active"' : 'class="page-item"' ?>>
				<a class="page-link" href="<?= $link['uri'] ?>" title="<?=current_url()?>/<?= $link['title'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>
	<?php else : ?>
			<li class="page-item" >
				<button class="bg-light page-link" type="button" disabled aria-label="0" title="0">
					<span class="text-muted" aria-hidden="true">0</span>
				</button>
			</li>
	<?php endif; ?>
		<?php if ($pager->hasNext()) : ?>
			<li class="page-item" >
				<a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" title="<?=current_url()?>/<?= $pager->getNextPageNumber() ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>
			<li class="page-item" >
				<a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" title="<?=current_url()?>/<?= $pager->getLastPageNumber() ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a>
			</li>
			<?php else : ?>
			<li class="page-item" >
				<button class="bg-light page-link" type="button" disabled aria-label="No Next" title="No Next">
					<span class="text-muted" aria-hidden="true"><?= lang('Pager.next') ?></span>
				</button>
			</li>
			<li class="page-item" >
				<button class="bg-light page-link" type="button" disabled aria-label="No Last" title="No Last">
					<span class="text-muted" aria-hidden="true"><?= lang('Pager.last') ?></span>
				</button>
			</li>
		<?php endif ?>
	</ul>
</nav>
