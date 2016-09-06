<?php

use Phinx\Migration\AbstractMigration;

class InitialiMigration extends AbstractMigration
{
    public function up()
    {
        $step = $this->table('pje_step');
        $step->addColumn('title', 'string', array('limit' => 255))
              ->addColumn('description', 'string', array('limit' => 255))
              ->addColumn('step_class', 'string', array('limit' => 255))
              ->save();
        $job = $this->table('pje_job');
        $job->addColumn('title', 'string', array('limit' => 255))
              ->addColumn('description', 'string', array('limit' => 255))
              ->save();
        $jobStep = $this->table('pje_job_step');
        $jobStep->addColumn('job_id', 'integer')
                ->addColumn('step_id', 'integer')
              ->addColumn('title', 'string', array('limit' => 255))
              ->addColumn('unique_name', 'string', array('limit' => 255))
              ->save();
    }
}
