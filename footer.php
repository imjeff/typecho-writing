</main>
<footer>
<?php if ($this->is('index')){ ?><form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
<input type="text" id="s" name="s" class="text" placeholder="输入关键字"/>
<button type="submit" class="submit">搜索</button>
</form><?php } ?>
<span>&copy; <?php echo date( 'Y' ); ?> <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>"><?php $this->options->title(); ?></a> | <a href="<?php $this->options->feedUrl(); ?>">RSS</a> | <a href="#"> ↑↑ </a></span><br /><small>SHARED BY <a href="https://yayu.net" title="雅余">YAYU</a></small>
</footer>
<?php $this->footer(); ?>
</body>
</html>