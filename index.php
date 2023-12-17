<?php
/**
 * Writing 是一款极致极简写作主题，支持自定义背景、自定义菜单、暗黑模式、自适应，保留搜索及评论功能；内置文章归档模板。主题无 JS、CSS 文件载入，对程序极简优化，仅9个文件约50kb。<br/>
 * 发布页：<a href="https://yayu.net/projects/typecho-writing" target="_blank">https://yayu.net/projects/typecho-writing</a>
 *
 * @package Writing
 * @author Jeff Chen
 * @version 1.0.0
 * @link https://yayu.net/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
<?php if ($this->is('index')){ ?>
<h1 class="title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
<div class="home intro"><?php $this->options->description() ?></div>
<?php }; if ($this->is('archive')) { ?>
<h1 class="title"><?php $this->archiveTitle(['category' => _t('%s'),'search' => _t('搜索结果'),'tag' => _t('标签：%s'),'author' => _t('作者：%s')], '', ''); ?></h1>
<div class="intro"><?php if ( $this->is('search') ) { ?>关键词：<?php echo $this->archiveTitle('','',''); ?><?php } else { ?><?php echo $this->getDescription(); ?><?php } ?></div>
<?php } ?>
<?php if ($this->have()): ?>
<?php while ($this->next()): ?>
<article>
<?php $site_title_elem 	= $this->is('single') ? 'h1' : 'h2'; ?>
<<?php echo $site_title_elem; ?> class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></<?php echo $site_title_elem; ?>>
<?php if ( $this->is('archive') || $this->is('index') || $this->is('post') ) { ?><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time><?php } ?>
<?php if ( $this->is('single') ) { ?><div class="content"><?php $this->content(); ?></div><?php } ?>
</article>
<?php endwhile; ?>
<?php if ( $this->is('single') ) { ?>
<?php if ( $this->is('post') ) { ?><p class="tags"># <?php $this->tags('', true, '无标签'); ?></p><?php }; ?>
<div class="comlist"><br /><?php $this->need('comments.php'); ?></div>
<?php }; if ( $this->is('archive') || $this->is('index') ) { ?>
<div class="pages"><?php $this->pageLink('&nbsp;←&nbsp;'); ?><?php $this->pageLink('&nbsp;→&nbsp;','next'); ?></div>
<?php }; endif; ?>
<?php $this->need('footer.php'); ?>