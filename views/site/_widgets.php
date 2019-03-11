<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="fa fa-check-circle"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Completed count</span>
      <span class="info-box-number"><?= $completedCount ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-red"><i class="fa fa-exclamation-circle"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Failed count</span>
      <span class="info-box-number"><?= $failedCount ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix visible-sm-block"></div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Average execution</span>
      <span class="info-box-number">
          <?= $avgDuration['h'] ?><small>h</small>
          <?= $avgDuration['m'] ?><small>m</small>
          <?= $avgDuration['s'] ?><small>s</small>
      </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-clock-o"></i></span>

    <div class="info-box-content">
       <span class="info-box-text">Longest execution</span>
       <span class="info-box-number">
          <?= $maxDuration['h'] ?><small>h</small>
          <?= $maxDuration['m'] ?><small>m</small>
          <?= $maxDuration['s'] ?><small>s</small>
       </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
</div>