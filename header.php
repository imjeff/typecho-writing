<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php $this->archiveTitle(['category' => _t('%s'),'search' => _t('搜索结果：%s'),'tag' => _t('标签：%s'),'author' => _t('作者：%s')], '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->header(); ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
</head>
<body>
<header>
<nav><?php if ($this->is('single') || $this->is('category') || $this->is('search') || $this->is('tag')) { ?>
<b><a href="<?php $this->options->siteUrl(); ?>">← <?php $this->options->title() ?></a></b> | <?php } ?>
<?php if ($this->is('post')) { ?><?php $this->category(','); ?><?php } ?>
<?php if ($this->is('page') || $this->is('index') || $this->is('category') || $this->is('search') || $this->is('tag')) { ?>
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while($category->next()): ?>
<a<?php if($this->is('category', $category->slug)): ?> class="current"<?php endif; ?> href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a>
<?php endwhile; ?>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while ($pages->next()): ?>
<a<?php if ($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
<?php endwhile; ?>
<?php } ?></nav>
</header>
<main>