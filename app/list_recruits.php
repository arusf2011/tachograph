<?php
    $f3 = Base::instance();

    $f3->set('recruits',$db->exec('SELECT * FROM recrutation ORDER BY id DESC'));
    $recruits = $f3->get('recruits');
    $f3->set('trucks',$db->exec('SELECT short_name, name FROM trucks'));
    $trucks = $f3->get('trucks');

    $count_recruits = count($recruits);
    if($count_recruits > 0)
    {
        for($i = 0; $i < count($recruits);$i++)
        {
            ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100">
                        <div class="card-header">
                            <p style="font-size: 1.4rem; margin-bottom: 0;"><b><?= $recruits[$i]['nickname'].' - '.$recruits[$i]['age'].' '.$f3->get('years_old') ?></b></p> 
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="small text-primary mb-1"><?= $f3->get('email').' - '.$recruits[$i]['email'] ?></p>
                                    <?php
                                        if($recruits[$i]['ats'] == true)
                                        {
                                            ?>
                                            <p class="small text-primary mb-1"><?= $f3->get('ats_owner').' - '.$f3->get('yes') ?></p>
                                            <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <p class="small text-primary mb-1"><?= $f3->get('ats_owner').' - '.$f3->get('no') ?></p>
                                            <?php
                                        }
                                    ?>
                                    <a class="small text-dark text-decoration-none mb-1" target="_blank" href="<?= $recruits[$i]['steam_link'] ?>"><i class="fab fa-steam fa-fw"></i> <?= $f3->get('steam_profile') ?></a><br>
                                    <?php if($recruits[$i]['status'] == 0)
                                    {
                                        ?>
                                            <button href="javascript:void(0);" class="btn btn-primary mt-3 check_btn" data-href="./recruit/<?= $recruits[$i]['id'] ?>">
                                                <?= $f3->get('check_application') ?>
                                            </button>
                                        <?php
                                    }
                                    else if ($recruits[$i]['status'] == 1)
                                    {
                                        ?>
                                            <button class="btn btn-danger mt-3 check_btn" disabled>
                                                <?= $f3->get('rejected') ?>
                                            </button>
                                        <?php
                                    }
                                    else if ($recruits[$i]['status'] == 2)
                                    {
                                        ?>
                                            <button class="btn btn-success mt-3 check_btn" disabled>
                                                <?= $f3->get('accepted') ?>
                                            </button>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-user fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
    else
    {
        ?>
            <div class="alert alert-success container-fluid"><?= $f3->get('none_recruits') ?></div>
        <?php
    }