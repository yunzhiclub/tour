<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
namespace think\console\command\optimize;

use think\console\Command;
use think\console\Input;
use think\console\input\Option;
use think\console\Output;
use think\Db;
use think\Facade;

class Schema extends Command
{
    /** @var  Output */
    protected $output;

    protected function configure()
    {
        $this->setName('optimize:schema')
            ->addOption('db', null, Option::VALUE_REQUIRED, 'db name .')
            ->addOption('table', null, Option::VALUE_REQUIRED, 'table name .')
            ->addOption('module', null, Option::VALUE_REQUIRED, 'module name .')
            ->setDescription('Build database schema cache.');
    }

    protected function execute(Input $input, Output $output)
    {
        if (!is_dir(Facade::make('app')->getRuntimePath() . 'schema')) {
            @mkdir(Facade::make('app')->getRuntimePath() . 'schema', 0755, true);
        }
        if ($input->hasOption('module')) {
            $module = $input->getOption('module');
            // 读取模型
            $list = scandir(Facade::make('app')->getAppPath() . $module . DIRECTORY_SEPARATOR . 'model');
            $app  = Facade::make('app')->getNamespace();
            foreach ($list as $file) {
                if (0 === strpos($file, '.')) {
                    continue;
                }
                $class = '\\' . $app . '\\' . $module . '\\model\\' . pathinfo($file, PATHINFO_FILENAME);
                $this->buildModelSchema($class);
            }
            $output->writeln('<info>Succeed!</info>');
            return;
        } elseif ($input->hasOption('table')) {
            $table = $input->getOption('table');
            if (!strpos($table, '.')) {
                $dbName = Db::getConfig('database');
            }
            $tables[] = $table;
        } elseif ($input->hasOption('db')) {
            $dbName = $input->getOption('db');
            $tables = Db::getTables($dbName);
        } elseif (!\think\facade\Config::get('app_multi_module')) {
            $app  = Facade::make('app')->getNamespace();
            $list = scandir(Facade::make('app')->getAppPath() . 'model');
            foreach ($list as $file) {
                if (0 === strpos($file, '.')) {
                    continue;
                }
                $class = '\\' . $app . '\\model\\' . pathinfo($file, PATHINFO_FILENAME);
                $this->buildModelSchema($class);
            }
            $output->writeln('<info>Succeed!</info>');
            return;
        } else {
            $tables = Db::getTables();
        }

        $db = isset($dbName) ? $dbName . '.' : '';
        $this->buildDataBaseSchema($tables, $db);

        $output->writeln('<info>Succeed!</info>');
    }

    protected function buildModelSchema($class)
    {
        $reflect = new \ReflectionClass($class);
        if (!$reflect->isAbstract() && $reflect->isSubclassOf('\think\Model')) {
            $table   = $class::getTable();
            $dbName  = $class::getConfig('database');
            $content = '<?php ' . PHP_EOL . 'return ';
            $info    = $class::getConnection()->getFields($table);
            $content .= var_export($info, true) . ';';
            file_put_contents(Facade::make('app')->getRuntimePath() . 'schema/' . $dbName . '.' . $table . '.php', $content);
        }
    }

    protected function buildDataBaseSchema($tables, $db)
    {
        if ('' == $db) {
            $dbName = Db::getConfig('database') . '.';
        } else {
            $dbName = $db;
        }
        foreach ($tables as $table) {
            $content = '<?php ' . PHP_EOL . 'return ';
            $info    = Db::getFields($db . $table);
            $content .= var_export($info, true) . ';';
            file_put_contents(Facade::make('app')->getRuntimePath() . 'schema' . DIRECTORY_SEPARATOR . $dbName . $table . '.php', $content);
        }
    }
}
