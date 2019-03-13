<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Atomium Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Jobs',
                        'icon' => 'cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Manage', 'icon' => 'th-list', 'url' => ['/job']],
                            ['label' => 'Add', 'icon' => 'plus', 'url' => ['/job/create']]
                        ]
                    ],
                    [
                        'label' => 'Steps',
                        'icon' => 'puzzle-piece',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Manage', 'icon' => 'th-list', 'url' => ['/step']],
                            ['label' => 'Add', 'icon' => 'plus', 'url' => ['/step/create']]
                        ]
                    ],
                    [
                        'label' => 'Stats',
                        'icon' => 'line-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Job Overview', 'icon' => 'pie-chart', 'url' => ['/stats/overview']],
                            ['label' => 'Job Stats', 'icon' => 'bar-chart', 'url' => ['/stats/job']]
                        ]
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
