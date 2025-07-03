<?php
namespace app\commands;
use yii\console\Controller;
use Yii;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // === Модули, для которых мы задаем права ===
        $modules = ['admin','admission', 'corporate', 'pressService'];

        foreach ($modules as $module) {
            // Permissions
            $create = $auth->createPermission("$module/create");
            $create->description = ucfirst($module) . " Create";
            $auth->add($create);

            $update = $auth->createPermission("$module/update");
            $update->description = ucfirst($module) . " Update";
            $auth->add($update);

            $delete = $auth->createPermission("$module/delete");
            $delete->description = ucfirst($module) . " Delete";
            $auth->add($delete);

            // Editor Role
            $editor = $auth->createRole("{$module}Editor");
            $auth->add($editor);
            $auth->addChild($editor, $create); // только create

            // Admin Role
            $admin = $auth->createRole("{$module}Admin");
            $auth->add($admin);
            $auth->addChild($admin, $create);
            $auth->addChild($admin, $update);
            $auth->addChild($admin, $delete);
            if($module==='admin'){
            $auth->assign($admin, 1);

            }
        }






    
    }
}