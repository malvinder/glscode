<?php
use app\assets\AppAsset;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head();

    $this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        ['depends' => [yii\web\JqueryAsset::className()]]); ?>
    ?>


    <script type="text/javascript">
        // Assign base url
        var baseUrl = "<?php echo yii::$app->request->baseUrl; ?>";
    </script>
</head>
<body>

<?php $this->beginBody() ?>
<div class="app app-header-fixed ">


    <!-- header -->
  <header id="header" class="app-header navbar" role="menu">
      <!-- navbar header -->
      <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt">
            <img src="<?php echo yii::$app->request->baseUrl; ?>/img/logo.png" alt="."
                 class="image-responsive logo-img">

        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse -->
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
            <i class="icon-user fa-fw"></i>
          </a>
        </div>
        <!-- / buttons -->

          <ul class="nav navbar-nav hidden-sm">
              <li class="dropdown pos-stc">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                      <span>Admin</span>
                      <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu wrapper w-full bg-white">
                      <div class="row">
                          <div class="col-sm-4">
                              <div class="m-l-xs m-t-xs m-b-xs font-bold">Backend routes <span
                                      class="badge badge-sm bg-success"></span>
                              </div>
                              <div class="row">
                                  <div class="col-xs-6 adminPanelWidget">
                                      <?php
                                      echo GhostMenu::widget([
                                          'encodeLabels' => false,
                                          'activateParents' => true,
                                          'items' => UserManagementModule::menuItems()

                                      ]);

                                      ?>
                                  </div>
                                  <div class="col-xs-6">

                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4 b-l b-light">
                              <div class="m-l-xs m-t-xs m-b-xs font-bold">Frontend routes <span
                                      class="label label-sm bg-primary"></span></div>
                              <div class="row">
                                  <div class="col-xs-6 adminPanelWidget">
                                      <?php
                                      echo GhostMenu::widget([
                                          'encodeLabels' => false,
                                          'activateParents' => true,
                                          'items' => [

                                              [
                                                  'label' => '',
                                                  'items' => [
                                                      ['label' => 'Login', 'url' => ['/user-management/auth/login']],
                                                      ['label' => 'Logout', 'url' => ['/user-management/auth/logout']],
                                                      [
                                                          'label' => 'Registration',
                                                          'url' => ['/user-management/auth/registration']
                                                      ],
                                                      [
                                                          'label' => 'Change own password',
                                                          'url' => ['/user-management/auth/change-own-password']
                                                      ],
                                                      [
                                                          'label' => 'Password recovery',
                                                          'url' => ['/user-management/auth/password-recovery']
                                                      ],
                                                      [
                                                          'label' => 'E-mail confirmation',
                                                          'url' => ['/user-management/auth/confirm-email']
                                                      ],
                                                  ],
                                              ],
                                          ],

                                      ]);

                                      ?>
                                  </div>
                                  <div class="col-xs-6">
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4 b-l b-light">
                              <div class="m-l-xs m-t-xs m-b-sm font-bold">Analysis</div>
                              <div class="text-center">
                                  <div class="inline">
                                      <div ui-jq="easyPieChart" ui-options="{
                          percent: 65,
                          lineWidth: 50,
                          trackColor: '#e8eff0',
                          barColor: '#23b7e5',
                          scaleColor: false,
                          size: 100,
                          rotate: 90,
                          lineCap: 'butt',
                          animate: 2000
                        }">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>

          <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="<?php echo Yii::$app->homeUrl; ?>/img/a0.jpg" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md">Username</span>
            </a>
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
      <!-- / navbar collapse -->
  </header>
  <!-- / header -->


    <!-- aside -->
  <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- user -->
          <div class="clearfix hidden-xs text-center hide" id="aside-user">
            <div class="dropdown wrapper">
              <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="<?php echo Yii::$app->homeUrl; ?>/img/a0.jpg" class="img-full" alt="...">
                </span>
              </a>
              <!-- dropdown -->
              <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                  <span class="arrow top hidden-folded arrow-info"></span>

                  <div class="progress progress-xs m-b-none dker">
                    <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                  </div>
                </li>
                <li>
                  <a href>Settings</a>
                </li>
                <li>
                  <a href="#">Profile</a>
                </li>
                <li>
                  <a href>
                    <span class="badge bg-danger pull-right">3</span>
                    Notifications
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">Logout</a>
                </li>
              </ul>
              <!-- / dropdown -->
            </div>
            <div class="line dk hidden-folded"></div>
          </div>
          <!-- / user -->

          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">

              <li>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href="index/">
                      <span>Dashboard</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="line dk"></li>

              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Components</span>
              </li>

              <li>
                  <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicle/save">
                  <span class="pull-right text-muted">
            
                  </span>
                  <i class="glyphicon glyphicon-th"></i>
                  <span>Vehicles Receiving</span>
                </a>
              </li>

              <li>
                  <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/events">
                  <span class="pull-right text-muted">
            
                  </span>
                  <i class="glyphicon glyphicon-th"></i>
                  <span>Event Management</span>
                </a>
              </li>

              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Vehicle Management</span>
              </li>
              <li>
                  <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <i class="glyphicon glyphicon-th"></i>
                  <span>Vehicles types</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href>
                      <span>Vehicles types</span>
                    </a>
                  </li>
                    <li>
                        <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/types">
                            <span>Listing</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/type/add">
                            <span>Add New</span>
                        </a>
                    </li>
                 </ul>
                 </li>

                <li>
                    <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                        <i class="glyphicon glyphicon-th"></i>
                        <span>Vehicle Info</span>
                    </a>
                    <ul class="nav nav-sub dk">
                        <li class="nav-sub-header">
                            <a href>
                                <span>Vehicle Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicle/save">
                                <span>Add New</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                        <i class="glyphicon glyphicon-th"></i>
                        <span>Vehicles Status</span>
                    </a>
                    <ul class="nav nav-sub dk">
                        <li class="nav-sub-header">
                            <a href>
                                <span>Vehicles Status</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/status">
                                <span>Listing</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/status/add">
                                <span>Add New</span>
                            </a>
                        </li>
                    </ul>
                </li>

                 <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Plate Management</span>
              </li>

                <li>
                    <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                        <i class="glyphicon glyphicon-th"></i>
                        <span>Plate Numbers</span>
                    </a>
                    <ul class="nav nav-sub dk">
                        <li class="nav-sub-header">
                            <a href>
                                <span>Plate Numbers</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/plates/numbers">
                                <span>Listing</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/plates/number/add">
                                <span>Add New</span>
                            </a>
                        </li>
                    </ul>
                </li>
              <li>
                  <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                      <i class="glyphicon glyphicon-th"></i>
                      <span>Plate Type</span>
                  </a>
                  <ul class="nav nav-sub dk">
                      <li class="nav-sub-header">
                          <a href>
                              <span>Plate Type</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/plates/types">
                              <span>Listing</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/plates/type/add">
                              <span>Add New</span>
                          </a>
                      </li>
                  </ul>
              </li>

              <li>
                  <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                      <i class="glyphicon glyphicon-th"></i>
                      <span>Plate Status</span>
                  </a>
                  <ul class="nav nav-sub dk">
                      <li class="nav-sub-header">
                          <a href>
                              <span>Plate Status</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/plates/statuses">
                              <span>Listing</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/plates/status/add">
                              <span>Add New</span>
                          </a>
                      </li>
                  </ul>
              </li>


              <li>
                  <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                      <i class="glyphicon glyphicon-th"></i>
                      <span>Events</span>
                  </a>
                  <ul class="nav nav-sub dk">
                      <li class="nav-sub-header">
                          <a href>
                              <span>Events</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/events">
                              <span>Listing</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/event/add">
                              <span>Add New</span>
                          </a>
                      </li>
                  </ul>
              </li>

              <li>
                  <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                      <i class="glyphicon glyphicon-th"></i>
                      <span>Appointment</span>
                  </a>
                  <ul class="nav nav-sub dk">
                      <li class="nav-sub-header">
                          <a href>
                              <span>Vehicles Appointment</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/appointments">
                              <span>Listing</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/appointment/make">
                              <span>Add New</span>
                          </a>
                      </li>
                  </ul>
              </li>


              <li class="line dk hidden-folded"></li>

            </ul>
          </nav>
          <!-- nav -->

          <!-- aside footer -->

          <!-- / aside footer -->
        </div>
      </div>
  </aside>
  <!-- / aside -->


            <?= $content ?>

  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.0.3 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2015 Copyright.
    </div>
  </footer>
  <!-- / footer -->

    <style>

    </style>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
