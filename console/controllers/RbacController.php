<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$auth = Yii::$app->authManager;
		$auth->removeAll();

		// 添加 "createPost" 权限
		$createPost = $auth->createPermission('createPost');//增加auth_item权限记录
		$createPost->description = 'Create a post';
		$auth->add($createPost);

		// 添加 "updatePost" 权限
		$updatePost = $auth->createPermission('updatePost');//增加auth_item权限记录
		$updatePost->description = 'Update post';
		$auth->add($updatePost);

		// 添加 "deletePost" 权限
		$deletePost = $auth->createPermission('deletePost');//增加auth_item权限记录
		$deletePost->description = 'Delete post';
		$auth->add($deletePost);

		// 添加 "approveComment" 权限
		$approveComment = $auth->createPermission('approveComment');//增加auth_item权限记录
		$approveComment->description = 'Approve Comment';
		$auth->add($approveComment);

		// 添加 "author" 角色并赋予 "createPost" 权限
		$author = $auth->createRole('author');//增加auth_item角色记录
		$auth->add($author);
		$auth->addChild($author, $createPost);

		//添加 "postAdmin" 角色并赋予 "createPost" "updatePost" "deletePost"
		$postAdmin = $auth->createRole('postAdmin');
		$postAdmin->description = 'Post Admin';
		$auth->add($postAdmin);
		$auth->addChild($postAdmin, $createPost);//增加auth_item_child建立关系记录
		$auth->addChild($postAdmin, $updatePost);//增加auth_item_child建立关系记录
		$auth->addChild($postAdmin, $deletePost);//增加auth_item_child建立关系记录

		//添加 "postOperator" 角色并赋予  "deletePost"
		$postOperator = $auth->createRole('postOperator');
		$postOperator->description = 'Post Operator';
		$auth->add($postOperator);
		$auth->addChild($postOperator, $deletePost);//增加auth_item_child建立关系记录

		//添加 "commentAuditor" 角色并赋予  "approveComment"
		$commentAuditor = $auth->createRole('commentAuditor');
		$commentAuditor->description = 'Comment Auditor';
		$auth->add($commentAuditor);
		$auth->addChild($commentAuditor, $approveComment);//增加auth_item_child建立关系记录

		// 添加 "admin" 角色并赋予其他角色所有权限
		$admin = $auth->createRole('admin');//增加auth_item角色
		$admin->description = 'Super Admin';
		$auth->add($admin);
		$auth->addChild($admin, $postAdmin);//增加auth_item_child建立关系记录
		$auth->addChild($admin, $commentAuditor);//增加auth_item_child建立关系记录

		// 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id
		// 通常在你的 User 模型中实现这个函数。
		$auth->assign($admin, 1);//用户分配角色，auth_assginment
		$auth->assign($postAdmin, 2);
		$auth->assign($postOperator, 3);
		$auth->assign($commentAuditor, 4);

	}
}