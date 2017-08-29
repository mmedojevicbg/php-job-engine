<?php
namespace app\components;

class SystemInfoThread extends \Thread{
    public function __construct(\Threaded $storage) {
        $this->storage = $storage; 
    }
    function run(){
        while(!$this->done) {
            $system = new SystemInfo();
            $this->storage[] = $system->getCpuLoadPercentage();
            $this->synchronized(function($thread){
                $thread->stored = true;
                $thread->notify();
            }, $this);
            sleep(1);
        }
    }
}

class SystemInfo
{
    /**
     * Return RAM Total in Bytes.
     *
     * @return int Bytes
     */
    public function getRamTotal()
    {
        $result = 0;

        if (PHP_OS == 'WINNT') {
            $lines = null;
            $matches = null;
            exec('wmic ComputerSystem get TotalPhysicalMemory /Value', $lines);
            if (preg_match('/^TotalPhysicalMemory\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1];
            }
        } elseif (PHP_OS == 'Darwin'){

        } else {
            $fh = fopen('/proc/meminfo', 'r');
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                    $result = $pieces[1];
                    // KB to Bytes
                    $result = $result * 1024;
                    break;
                }
            }
            fclose($fh);
        }
        // KB RAM Total
        return (int) $result;
    }
    /**
     * Return free RAM in Bytes.
     *
     * @return int Bytes
     */
    public function getRamFree()
    {
        $result = 0;
        if (PHP_OS == 'WINNT') {
            $lines = null;
            $matches = null;
            exec('wmic OS get FreePhysicalMemory /Value', $lines);
            if (preg_match('/^FreePhysicalMemory\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1] * 1024;
            }
        } elseif (PHP_OS == 'Darwin'){

        } else {
            $fh = fopen('/proc/meminfo', 'r');
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemFree:\s+(\d+)\skB$/', $line, $pieces)) {
                    // KB to Bytes
                    $result = $pieces[1] * 1024;
                    break;
                }
            }
            fclose($fh);
        }
        // KB RAM Total
        return (int) $result;
    }
    
    public function getCpuLoadPercentage()
    {
        $result = -1;
        $lines = null;
        if (PHP_OS == 'WINNT') {
            $matches = null;
            exec('wmic.exe CPU get loadpercentage /Value', $lines);
            if (preg_match('/^LoadPercentage\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1];
            }
        } elseif (PHP_OS == 'Darwin'){
        	$top = shell_exec('top | head | grep "CPU usage" &');
        	$parts = explode(',', $top);
        	$user = str_replace('CPU usage: ', '', $parts[0]);
        	$user = str_replace('% user', '', $user);
        	$sys = trim($parts[1]);
        	$sys = str_replace('% idle', '', $sys);
        	$result = $user + $sys;
        } else {
            $checks = array();
            foreach (array(0, 1) as $i) {
                $cmd = '/proc/stat';
                $lines = array();
                $fh = fopen($cmd, 'r');
                while ($line = fgets($fh)) {
                    $lines[] = $line;
                }
                fclose($fh);
                //$lines = array($tests[$i]);
                foreach ($lines as $line) {
                    $ma = array();
                    if (!preg_match('/^cpu  (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+)$/', $line, $ma)) {
                        continue;
                    }
                    $total = $ma[1] + $ma[2] + $ma[3] + $ma[4] + $ma[5] + $ma[6] + $ma[7] + $ma[8] + $ma[9];
                    $ma['total'] = $total;
                    $checks[] = $ma;
                    break;
                }
                if ($i == 0) {
                    sleep(1);
                }
            }
            $diffIdle = $checks[1][4] - $checks[0][4];
            $diffTotal = $checks[1]['total'] - $checks[0]['total'];
            $diffUsage = (1000 * ($diffTotal - $diffIdle) / $diffTotal + 5) / 10;
            $result = $diffUsage;
        }
        return (float) $result;
    }
}