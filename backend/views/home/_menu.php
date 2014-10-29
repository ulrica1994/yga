<?php
/**
 *      ┏┓　　　┏┓
 *    ┏┛┻━━━┛┻┓
 *    ┃　　　　　　　┃
 *    ┃　　　━　　　┃
 *    ┃　┳┛　┗┳　┃
 *    ┃　　　　　　　┃
 *    ┃　　　┻　　　┃
 *    ┃　　　　　　　┃
 *    ┗━┓　　　┏━┛
 *        ┃　　　┃   神兽保佑
 *        ┃　　　┃   代码无BUG！
 *         ┃　　　┗━━━┓
 *        ┃　　　　　　　┣┓
 *        ┃　　　　　　　┏┛
 *        ┗┓┓┏━┳┓┏┛
 *          ┃┫┫　┃┫┫
 *          ┗┻┛　┗┻┛
 */

?>
<ul class="nav nav-list">
    <?php foreach ($list as $father): ?>
        <?php if (Yii::$app->user->can($father->route)): ?>
            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="<?= $father->menuicon ?>"></i>
                    <span class="menu-text"> <?= $father->menuname ?> </span>

                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <?php foreach ($father->getSon()->all() as $son): ?>
                        <?php if ($son->level == 3 && Yii::$app->user->can($son->route)): ?>
                            <li>
                                <a href="/<?= $son->route ?>">
                                    <i class="icon-double-angle-right"></i>
                                    <?= $son->menuname ?>
                                </a>
                            </li>
                        <?php elseif (Yii::$app->user->can($son->route)): ?>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-double-angle-right"></i>
                                    <?= $son->menuname ?>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <?php foreach ($son->getSon()->all() as $gson): ?>
                                        <?php if (Yii::$app->user->can($gson->route)): ?>
                                            <li>
                                                <a href="/<?= $gson->route ?>">
                                                    <i class="<?= $gson->menuicon ?>"></i>
                                                    <?= $gson->menuname ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>