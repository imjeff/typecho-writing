<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php $this->archiveTitle(['category' => _t('%s'),'search' => _t('搜索结果：%s'),'tag' => _t('标签：%s'),'author' => _t('作者：%s')], '', ' - '); ?><?php $this->options->title(); ?></title>
<style>
:root {
    --width: 600px;
    --font-scale: 1em;
    --background-color: #fff;
    --heading-color: #222;
    --nav-color:#777;
    --text-color: #333;
    --code-background-color: #f2f2f2;
    --code-color: #222;
    --blockquote-color: #222;
    --gray-color: #aaa;
}
@media (prefers-color-scheme: dark) {
:root {
    --background-color: #111;
    --heading-color: #d9c48f;
    --nav-color: #8f8873;
    --text-color: #d9c48f;
    --code-background-color: #000;
    --code-color: #ddd;
    --blockquote-color: #ccc;
    --gray-color: #756a56;
    }
}
body {
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",Helvetica,Arial,"PingFangSC-Regular","Hiragino Sans GB","Lantinghei SC","Microsoft Yahei","Source Han Sans CN","WenQuanYi Micro Hei",SimSun,sans-serif;
    font-size: var(--font-scale);
    margin: auto;
    padding: 20px;
    max-width: var(--width);
    text-align: center;
    background-color: var(--background-color);
    word-wrap: break-word;
    overflow-wrap: break-word;
    line-height: 1.8;
    color: var(--text-color);
}
html{scroll-behavior:smooth;}
h1,h2,h3,h4,h5,h6{color:var(--heading-color);}
a{color:var(--text-color);cursor:pointer;text-decoration:none}
a:hover{opacity:0.5;}
nav a{margin:0 5px;}
strong,b{color:var(--heading-color)}
button{margin:0;cursor:pointer}
time,.commentmetadata a{color:var(--gray-color);font-size:0.8em;}
table{width:100%}
hr{border:0;border-top:1px dashed}
img{max-width:100%;height:auto}
code{font-family:monospace;padding:2px;background-color:var(--code-background-color);color:var(--code-color);border-radius:3px}
blockquote{border-left:1px solid var(--gray-color);color:var(--code-color);padding-left:20px;font-style:italic}
header,footer{margin: 10px 0;color:var(--gray-color);}
footer{padding-top:40px;}
header a,footer a{color:var(--nav-color)}
article{margin-bottom:30px;}
h1.title,h2.title {margin:50px 0 0;line-height:1.6;}
.intro{color:var(--gray-color);margin-bottom:50px;}
.home.intro:after{content:"✍";display: block;font-size:2em;margin-top: 40px;}
.content,.comlist,.respond{text-align:left;padding-top:40px;}
.content a,.comment-reply a,.respond a{border-bottom:1px solid var(--text-color);}
.content a:has(img){border:none}
.pages a{font-size:20px;padding:5px;}
.tags,.tags a{color:var(--gray-color);margin-right:10px;}
.comlist{max-width:450px;margin:0 auto;}
.comment-list,.comment-list .comment-children{list-style: none;padding:0;margin-bottom:40px;}
.comment-body{margin:30px 0;list-style: none;}
.comment-body .comment-children{margin-left:35px;}
.comment-author cite{font-weight:bold;font-style:normal;}
input,textarea{border-radius:4px;border:1px solid var(--gray-color);display:block;font-size:0.9em;margin:0 0 10px;padding:10px;width:calc(100% - 25px);background:var(--background-color);color:var(--heading-color)}
input:focus,textarea:focus{border:1px solid var(--text-color);outline:0}
button[type="submit"]{border:none;border-radius:4px;padding:10px 16px;width:initial;background:var(--heading-color);color:var(--background-color);font-size:0.9em}
button[type="submit"]:hover{cursor:pointer;opacity:.7;}
#search input{margin:20px auto;width: initial;display:inline-block;}
</style>
<?php $this->header(); ?>
</head>
<body>
<header>
<nav><?php if ($this->is('single') || $this->is('category') || $this->is('search') || $this->is('tag')) { ?>
<a href="<?php $this->options->siteUrl(); ?>">← 首页</a> | <?php } ?>
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