<?php
return [
    'accessBackend' => [
        'type' => 2,
        'description' => 'Can access backend',
    ],
    'administrateRbac' => [
        'type' => 2,
        'description' => 'Can administrate all "RBAC" module',
        'children' => [
            'BViewRoles',
            'BCreateRoles',
            'BUpdateRoles',
            'BDeleteRoles',
            'BViewPermissions',
            'BCreatePermissions',
            'BUpdatePermissions',
            'BDeletePermissions',
            'BViewRules',
            'BCreateRules',
            'BUpdateRules',
            'BDeleteRules',
        ],
    ],
    'BViewRoles' => [
        'type' => 2,
        'description' => 'Can view roles list',
    ],
    'BCreateRoles' => [
        'type' => 2,
        'description' => 'Can create roles',
    ],
    'BUpdateRoles' => [
        'type' => 2,
        'description' => 'Can update roles',
    ],
    'BDeleteRoles' => [
        'type' => 2,
        'description' => 'Can delete roles',
    ],
    'BViewPermissions' => [
        'type' => 2,
        'description' => 'Can view permissions list',
    ],
    'BCreatePermissions' => [
        'type' => 2,
        'description' => 'Can create permissions',
    ],
    'BUpdatePermissions' => [
        'type' => 2,
        'description' => 'Can update permissions',
    ],
    'BDeletePermissions' => [
        'type' => 2,
        'description' => 'Can delete permissions',
    ],
    'BViewRules' => [
        'type' => 2,
        'description' => 'Can view rules list',
    ],
    'BCreateRules' => [
        'type' => 2,
        'description' => 'Can create rules',
    ],
    'BUpdateRules' => [
        'type' => 2,
        'description' => 'Can update rules',
    ],
    'BDeleteRules' => [
        'type' => 2,
        'description' => 'Can delete rules',
    ],
    'user' => [
        'type' => 1,
        'description' => 'User',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Admin',
        'children' => [
            'user',
        ],
    ],
    'superadmin' => [
        'type' => 1,
        'description' => 'Super admin',
        'children' => [
            'admin',
            'accessBackend',
            'administrateRbac',
            'administrateUsers',
            'administrateBlogs',
            'administrateComments',
        ],
    ],
    'administrateUsers' => [
        'type' => 2,
        'description' => 'Can administrate all "Users" module',
        'children' => [
            'BViewUsers',
            'BCreateUsers',
            'BUpdateUsers',
            'BDeleteUsers',
            'viewUsers',
            'createUsers',
            'updateUsers',
            'updateOwnUsers',
            'deleteUsers',
            'deleteOwnUsers',
        ],
    ],
    'BViewUsers' => [
        'type' => 2,
        'description' => 'Can view backend users list',
    ],
    'BCreateUsers' => [
        'type' => 2,
        'description' => 'Can create backend users',
    ],
    'BUpdateUsers' => [
        'type' => 2,
        'description' => 'Can update backend users',
    ],
    'BDeleteUsers' => [
        'type' => 2,
        'description' => 'Can delete backend users',
    ],
    'viewUsers' => [
        'type' => 2,
        'description' => 'Can view users list',
    ],
    'createUsers' => [
        'type' => 2,
        'description' => 'Can create users',
    ],
    'updateUsers' => [
        'type' => 2,
        'description' => 'Can update users',
        'children' => [
            'updateOwnUsers',
        ],
    ],
    'updateOwnUsers' => [
        'type' => 2,
        'description' => 'Can update own user profile',
        'ruleName' => 'author',
    ],
    'deleteUsers' => [
        'type' => 2,
        'description' => 'Can delete users',
        'children' => [
            'deleteOwnUsers',
        ],
    ],
    'deleteOwnUsers' => [
        'type' => 2,
        'description' => 'Can delete own user profile',
        'ruleName' => 'author',
    ],
    'administrateBlogs' => [
        'type' => 2,
        'description' => 'Can administrate all "Blogs" module',
        'children' => [
            'BViewBlogs',
            'BCreateBlogs',
            'BUpdateBlogs',
            'BDeleteBlogs',
            'viewBlogs',
            'createBlogs',
            'updateBlogs',
            'updateOwnBlogs',
            'deleteBlogs',
            'deleteOwnBlogs',
        ],
    ],
    'BViewBlogs' => [
        'type' => 2,
        'description' => 'Can view backend blogs list',
    ],
    'BCreateBlogs' => [
        'type' => 2,
        'description' => 'Can create backend blogs',
    ],
    'BUpdateBlogs' => [
        'type' => 2,
        'description' => 'Can update backend blogs',
    ],
    'BDeleteBlogs' => [
        'type' => 2,
        'description' => 'Can delete backend blogs',
    ],
    'viewBlogs' => [
        'type' => 2,
        'description' => 'Can view blogs',
    ],
    'createBlogs' => [
        'type' => 2,
        'description' => 'Can create blogs',
    ],
    'updateBlogs' => [
        'type' => 2,
        'description' => 'Can update blogs',
        'children' => [
            'updateOwnBlogs',
        ],
    ],
    'updateOwnBlogs' => [
        'type' => 2,
        'description' => 'Can update own blogs',
        'ruleName' => 'author',
    ],
    'deleteBlogs' => [
        'type' => 2,
        'description' => 'Can delete blogs',
        'children' => [
            'deleteOwnBlogs',
        ],
    ],
    'deleteOwnBlogs' => [
        'type' => 2,
        'description' => 'Can delete own blogs',
        'ruleName' => 'author',
    ],
    'administrateComments' => [
        'type' => 2,
        'description' => 'Can administrate all "Comments" module',
        'children' => [
            'BViewCommentsModels',
            'BCreateCommentsModels',
            'BUpdateCommentsModels',
            'BDeleteCommentsModels',
            'BManageCommentsModule',
            'BViewComments',
            'BUpdateComments',
            'BDeleteComments',
            'viewComments',
            'createComments',
            'updateComments',
            'updateOwnComments',
            'deleteComments',
            'deleteOwnComments',
        ],
    ],
    'BViewCommentsModels' => [
        'type' => 2,
        'description' => 'Can view backend comments models list',
    ],
    'BCreateCommentsModels' => [
        'type' => 2,
        'description' => 'Can create backend comments models',
    ],
    'BUpdateCommentsModels' => [
        'type' => 2,
        'description' => 'Can update backend comments models',
    ],
    'BDeleteCommentsModels' => [
        'type' => 2,
        'description' => 'Can delete backend comments models',
    ],
    'BManageCommentsModule' => [
        'type' => 2,
        'description' => 'Can enable or disable comments for installed modules',
    ],
    'BViewComments' => [
        'type' => 2,
        'description' => 'Can view backend comments list',
    ],
    'BUpdateComments' => [
        'type' => 2,
        'description' => 'Can update backend comments',
    ],
    'BDeleteComments' => [
        'type' => 2,
        'description' => 'Can delete backend comments',
    ],
    'viewComments' => [
        'type' => 2,
        'description' => 'Can view comments',
    ],
    'createComments' => [
        'type' => 2,
        'description' => 'Can create comments',
    ],
    'updateComments' => [
        'type' => 2,
        'description' => 'Can update comments',
        'children' => [
            'updateOwnComments',
        ],
    ],
    'updateOwnComments' => [
        'type' => 2,
        'description' => 'Can update own comments',
        'ruleName' => 'author',
    ],
    'deleteComments' => [
        'type' => 2,
        'description' => 'Can delete comments',
        'children' => [
            'deleteOwnComments',
        ],
    ],
    'deleteOwnComments' => [
        'type' => 2,
        'description' => 'Can delete own comments',
        'ruleName' => 'author',
    ],
    'administrateQrcode' => [
        'type' => 2,
    ],
    'BViewQrcodeModels' => [
        'type' => 2,
    ],
    'BViewQrcode' => [
        'type' => 2,
    ],
];
