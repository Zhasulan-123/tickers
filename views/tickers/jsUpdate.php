<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php if (!empty($page)) : ?>
<?php $i = 1; foreach ($page as $item) : ?>
    <tr>
        <td><?= $i++; ?></td>
        <td><?php echo Html::encode($item->bbp); ?></td>
        <td><?php echo Html::encode($item->bap); ?></td>
        <td>
            <?php
                $bbp = $item->bbp;
                $bap = $item->bap;
                $res = $bap - $bbp;
                $a = $res/$bap;
                echo $a;
            ?>
        </td>
        <td><?php echo Html::encode($item->created_at); ?></td>
        <td>
            <a href="#" class="delete_one" data-id="<?= $item->id; ?>" style="color:red;">
            <i class="fas fa-trash"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="5" style="text-align: center; color: red;"><?= Yii::t('app', 'Пусто!!!'); ?></td>
    </tr>
<?php endif; ?>