<?php
/**
 * 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
details{margin:10px 0;}
details ul{list-style:none;padding:0 0 10px;margin:0;}
details li{margin:6px 0;font-weight:bold;font-size:1.1em;}
summary{color:#999;}
summary:hover{cursor: pointer;opacity:0.5;}
</style>
<h1 class="title"><?php $this->title() ?></h1><br />
<p>
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
$year=0; $mon=0; $i=0; $j=0; $output='';
while($archives->next()):
$year_tmp = date('Y',$archives->created);
$mon_tmp = date('m',$archives->created);
$y=$year; $m=$mon;
if ($mon != $mon_tmp && $mon > 0) $output .= '</ul>';
if ($year != $year_tmp && $year > 0) $output .= '';
if ($year != $year_tmp && $mon != $mon_tmp) {
$year = $year_tmp;
$mon = $mon_tmp;
$output .= '<details><summary>'. $year .'年'. $mon .'月</summary><ul>';
}
$output .= '<li><a href="'.$archives->permalink .'" title="'. $archives->title .'">'. $archives->title .'</a></li>';
endwhile;
$output .= '</ul></details>';
echo $output;
?>
</p>
<?php $this->need('footer.php'); ?>