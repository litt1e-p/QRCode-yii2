<?php

namespace vendor\vova07\qrcode\commands;

use Yii;
use yii\console\Controller;

/**
 * Qrcode RBAC controller.
 */
class RbacController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'add';

    /**
     * @var array Main module permission array
     */
    public $mainPermission = [
        'name' => 'administrateQrcode',
        'description' => 'Can administrate all "Qrcode" module'
    ];

    /**
     * @var array Permission
     */
    public $permissions = [
        'BViewQrcode' => [
            'description' => 'Can view backend Qrcode list'
        ],
        'BCreateQrcode' => [
            'description' => 'Can create backend Qrcode'
        ],
        'BUpdateQrcode' => [
            'description' => 'Can update backend Qrcode'
        ],
        'BDeleteQrcode' => [
            'description' => 'Can delete backend Qrcode'
        ],
        'viewQrcode' => [
            'description' => 'Can view Qrcode'
        ],
        'createQrcode' => [
            'description' => 'Can create Qrcode'
        ],
        'updateQrcode' => [
            'description' => 'Can update Qrcode'
        ],
        'updateOwnQrcode' => [
            'description' => 'Can update own Qrcode',
            'rule' => 'author'
        ],
        'deleteQrcode' => [
            'description' => 'Can delete Qrcode'
        ],
        'deleteOwnQrcode' => [
            'description' => 'Can delete own Qrcode',
            'rule' => 'author'
        ]
    ];

    /**
     * Add comments RBAC.
     */
    public function actionAdd()
    {
        $auth = Yii::$app->authManager;
        $superadmin = $auth->getRole('superadmin');
        $mainPermission = $auth->createPermission($this->mainPermission['name']);
        if (isset($this->mainPermission['description'])) {
            $mainPermission->description = $this->mainPermission['description'];
        }
        if (isset($this->mainPermission['rule'])) {
            $mainPermission->ruleName = $this->mainPermission['rule'];
        }
        $auth->add($mainPermission);

        foreach ($this->permissions as $name => $option) {
            $permission = $auth->createPermission($name);
            if (isset($option['description'])) {
                $permission->description = $option['description'];
            }
            if (isset($option['rule'])) {
                $permission->ruleName = $option['rule'];
            }
            $auth->add($permission);
            $auth->addChild($mainPermission, $permission);
        }

        $auth->addChild($superadmin, $mainPermission);

        $updateQrcode = $auth->getPermission('updateQrcode');
        $updateOwnQrcode = $auth->getPermission('updateOwnQrcode');
        $deleteQrcode = $auth->getPermission('deleteQrcode');
        $deleteOwnQrcode = $auth->getPermission('deleteOwnQrcode');

        $auth->addChild($updateQrcode, $updateOwnQrcode);
        $auth->addChild($deleteQrcode, $deleteOwnQrcode);

        return static::EXIT_CODE_NORMAL;
    }

    /**
     * Remove comments RBAC.
     */
    public function actionRemove()
    {
        $auth = Yii::$app->authManager;
        $permissions = array_keys($this->permissions);

        foreach ($permissions as $name => $option) {
            $permission = $auth->getPermission($name);
            $auth->remove($permission);
        }

        $mainPermission = $auth->getPermission($this->mainPermission['name']);
        $auth->remove($mainPermission);

        return static::EXIT_CODE_NORMAL;
    }
}
