<?php $this->show('common/header') ?>

    <div class="headline"><?php echo "Hello, JunePHP!";?></div>
    <div class="info">
        <p><?=$usage?></p>
        <p>
            <?php if ($version): ?>
                数据库已连接，版本为：<?=$driver?> <?=$version?>
            <?php endif ?>
        </p>
    </div>
    <div class="copyright">
        <p>作者：<a href="http://pengblog.com">温鹏</a> &nbsp;&nbsp; Email：<a href="mailto:wen@pengblog.com">wen@pengblog.com</a> &nbsp;&nbsp;  Github：<a href="https://github.com/willper/JunePHP">JunePHP</a></p>
    </div>
<?php $this->show('common/footer') ?>
