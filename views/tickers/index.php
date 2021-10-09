<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Тестовое задание:';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=Yii::t('app', 'Тестовое задание:')?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
             <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                  <a class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                    <?=Yii::t('app', 'Добавить');?>
                  </a>
                </div>
             </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=Yii::t('app', 'ТИКЕРЫ')?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover past_up">
                  <thead>
                  <tr>
                    <th><?=Yii::t('app', '№')?></th>
                    <th><?=Yii::t('app', 'Лучший бид')?></th>
                    <th><?=Yii::t('app', 'Лучшее предложение')?></th>
                    <th><?=Yii::t('app', 'Считан: %')?></th>
                    <th><?=Yii::t('app', 'Дата и Время')?></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($model)) : ?>
                    <?php $i = 1; foreach ($model as $item) : ?>
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
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
           <form id="quickForm">
            <div class="modal-header">
              <h4 class="modal-title"><?=Yii::t('app', 'Добавить Тикер')?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputBbp"><?=Yii::t('app', 'Лучший бид')?></label>
                    <input type="text" name="bbp" class="form-control" id="exampleInputBbp" placeholder="000.00">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputBap"><?=Yii::t('app', 'Лучшее предложение')?></label>
                    <input type="text" name="bap" class="form-control" id="exampleInputBap" placeholder="000.00">
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('app', 'Закрыть')?></button>
              <button type="submit" class="btn btn-primary"><?=Yii::t('app', 'Добавить')?></button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  </div>
  <?php $this->registerJsFile('@web/js/home.js', ['depends' => 'app\assets\AppAsset']); ?>
  <?php $this->registerJsFile('@web/js/tickers.js', ['depends' => 'app\assets\AppAsset']); ?>