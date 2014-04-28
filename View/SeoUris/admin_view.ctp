<div class="seo_plugin">
	<?php echo $this->element('seo_view_head', array('plugin' => 'seo')); ?>
	<div class="seoUris view">
		<h2><?php echo __('Seo Uri');?></h2>
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo h($seoUri['SeoUri']['id']); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Uri'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo h($seoUri['SeoUri']['uri']); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Is Approved'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo h($seoUri['SeoUri']['is_approved']); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo h($seoUri['SeoUri']['created']); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo h($seoUri['SeoUri']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Seo Uri'), array('action' => 'edit', $seoUri['SeoUri']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Seo Uri'), array('action' => 'delete', $seoUri['SeoUri']['id']), null, __('Are you sure you want to delete # %s?', $seoUri['SeoUri']['id'])); ?> </li>
		</ul>
	</div>
	<div class="related">
		<h3><?php echo __('Related Redirects');?></h3>
		<?php if (!empty($seoUri['SeoRedirect'])):?>
			<dl>	<?php $i = 0; $class = ' class="altrow"';?>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Redirect');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoRedirect']['redirect']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Priority');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoRedirect']['priority']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Is Active');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoRedirect']['is_active']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Callback');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoRedirect']['callback']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoRedirect']['created']);?>
					&nbsp;</dd>
			</dl>
		<?php endif; ?>
		<div class="actions">
			<ul>
				<li>
					<?php
					if (!is_null($seoUri['SeoRedirect']['id'])) {
						echo $this->Html->link(__('Edit Redirect'), array('controller' => 'seo_redirects', 'action' => 'edit', $seoUri['SeoRedirect']['id']));
					} else {
						echo $this->Html->link(__('Add Redirect'), array('controller' => 'seo_redirects', 'action' => 'add', $seoUri['SeoUri']['id']));
					}
					?>
				</li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3><?php echo __('Related Titles');?></h3>
		<?php if (!empty($seoUri['SeoTitle'])):?>
			<dl>	<?php $i = 0; $class = ' class="altrow"';?>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Title');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoTitle']['title']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoTitle']['created']);?>
					&nbsp;</dd>
			</dl>
		<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php
					if (!is_null($seoUri['SeoTitle']['id'])) {
					 	echo $this->Html->link(__('Edit Title'), array('controller' => 'seo_titles', 'action' => 'edit', $seoUri['SeoTitle']['id']));
					} else {
						echo $this->Html->link(__('Add Title'), array('controller' => 'seo_titles', 'action' => 'add'));
					}
					?>
				</li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3><?php echo __('Related Canonical Links');?></h3>
		<?php if (!empty($seoUri['SeoTitle'])):?>
			<dl>	<?php $i = 0; $class = ' class="altrow"';?>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Canonical');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoCanonical']['canonical']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Active');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoCanonical']['is_active']);?>
					&nbsp;</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created');?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo h($seoUri['SeoCanonical']['created']);?>
					&nbsp;</dd>
			</dl>
		<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php
					if (!is_null($seoUri['SeoCanonical']['id'])) {
						echo $this->Html->link(__('Edit Canonical'), array('controller' => 'seo_canonicals', 'action' => 'edit', $seoUri['SeoCanonical']['id']));
					} else {
						echo $this->Html->link(__('Add Canonical'), array('controller' => 'seo_canonicals', 'action' => 'add'));
					}
					?>
				</li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3><?php echo __('Related Meta Tags');?></h3>
		<?php if (!empty($seoUri['SeoMetaTag'])):?>
			<table cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('Name'); ?></th>
					<th><?php echo __('Content'); ?></th>
					<th><?php echo __('Is Http Equiv'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
				<?php
				$i = 0;
				foreach ($seoUri['SeoMetaTag'] as $seoMetaTag):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo h($seoMetaTag['name']);?></td>
						<td><?php echo h($seoMetaTag['content']);?></td>
						<td><?php echo h($seoMetaTag['is_http_equiv']);?></td>
						<td><?php echo h($seoMetaTag['created']);?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View Meta Tag'), array('controller' => 'seo_meta_tags', 'action' => 'view', $seoMetaTag['id'])); ?>
							<?php echo $this->Html->link(__('Edit Meta Tag'), array('controller' => 'seo_meta_tags', 'action' => 'edit', $seoMetaTag['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete Meta Tag'), array('controller' => 'seo_meta_tags', 'action' => 'delete', $seoMetaTag['id']), null, __('Are you sure you want to delete # %s?', $seoMetaTag['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Meta Tag'), array('controller' => 'seo_meta_tags', 'action' => 'add'));?> </li>
			</ul>
		</div>
	</div>
</div>