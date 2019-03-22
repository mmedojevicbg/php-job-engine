<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) {
    ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php
} else {
        ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php
    } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>&copy; 2015 - <?= date('Y') ?> Softmetrix. 
        <a href="https://opensource.org/licenses/BSD-3-Clause" target="_blank">BSD licence</a></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-waring pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->

        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked/>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked/>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked/>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked/>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right"/>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>

<?php
$js = <<<EOT
    $(function(){
        function reloadInProgressData() {
            $.get('/in-progress/jobs', function(data){
                var icon = $('#in-progress-menu .fa-refresh');
                var counter = $('#in-progress-menu .job-count');
                var menu = $('#in-progress-menu .menu');
                menu.html('');
                counter.html('');
                if(data.length) {
                    icon.addClass('fa-spin');
                    counter.html(data.length);
                    $.each(data, function(){
                        var liMarkup = '<li><a class="in-progress-link" \
                                               href="#" \
                                               data-toggle="modal" \
                                               data-target="#modal-job" \
                                               data-id="'+$(this)[0].id+'" \
                                               data-job-id="'+$(this)[0].job_id+'" \
                                               data-title="'+$(this)[0].job_title+'"> \
                                               <h3>'+$(this)[0].job_title+'</h3> \
                                        </a></li>';
                        menu.append(liMarkup);
                    });
                    $('.in-progress-link').click(function() {
                        $("#modal-job .modal-title").text($(this).data('title'));
                        var jobId = $(this).data('job-id');
                        var executionId = $(this).data('id');
                        function reloadStepData() {
                            $.post('/in-progress/steps', {job: jobId, execution: executionId}, function(data){
                                var tableSteps = $("#modal-job .table-steps tbody");
                                tableSteps.html("");
                                $.each(data, function(){
                                    var stepStatus = '<span class="badge bg-green">PENDING</span>';
                                    if($(this)[0].step_success === "1") {
                                        stepStatus = '<span class="badge bg-light-blue">SUCCESS</span>';
                                    } else if($(this)[0].step_success === "0") {
                                        stepStatus = '<span class="badge bg-red">FAIL</span>';
                                    } else if($(this)[0].executing === "1") {
                                        stepStatus = '<span class="fa fa-refresh fa-spin"></span>';
                                    }
                                    var rowMarkup = '<tr> \
                                        <td>'+$(this)[0].step_title+'</td> \
                                        <td>'+stepStatus+'</td> \
                                      </tr>';
                                    tableSteps.append(rowMarkup);
                                });
                                var jobStatus = '<span class="fa fa-refresh fa-spin"></span>';
                                if(data[data.length-1].job_success === "1") {
                                    jobStatus = '<span class="badge bg-light-blue">SUCCESS</span>';
                                } else if(data[data.length-1].job_success === "0") {
                                    jobStatus = '<span class="badge bg-red">FAIL</span>';
                                } 
                                var rowMarkupJob = '<tr> \
                                        <td style="border-top: 1px solid #000;"><b>'+data[data.length-1].job_title+'</b></td> \
                                        <td style="border-top: 1px solid #000;">'+jobStatus+'</td> \
                                </tr>';
                                tableSteps.append(rowMarkupJob);
                            });
                        };
                        reloadStepData();
                        var interval = setInterval(reloadStepData, 1000);
                        $('#modal-job').on('hidden.bs.modal', function (e) {
                            clearInterval(interval);
                        })
                    });
                } else {
                    icon.removeClass('fa-spin');
                }
            });
        }
        reloadInProgressData();
        setInterval(reloadInProgressData, 3000);
    });
EOT;
$this->registerJs($js);
?>

<div class="modal fade" id="modal-job">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Default Modal</h4>
    </div>
    <div class="modal-body">
        <table class="table table-condensed table-striped table-steps">
                <thead><tr>
                  <th>Step</th>
                  <th style="width: 40px">Status</th>
                </tr>
                </thead>
                <tbody>
              </tbody></table>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->