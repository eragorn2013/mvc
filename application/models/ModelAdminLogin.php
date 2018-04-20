<?php

class ModelAdminLogin extends Model
{		
	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		session_start();
		$access = false;

		if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['key']) && $_SESSION['key'] != '')
		{
			$id = (int)$_SESSION['id'];
			$key = md5(md5(htmlspecialchars($_SESSION['key']).'mkfg').'mkfg');
			try
			{
				$sql='SELECT COUNT(*) FROM admin WHERE id=:id AND prikey=:prikey';
				$s=$this->pdo->prepare($sql);
				$s->bindValue(':id',$id);
				$s->bindValue(':prikey',$key);
				$s->execute();
			}
			catch(PDOException $e){out('Ошибка запроса ключа');}
			$row=$s->fetch();
			if($row[0]>0)$access=true;
		}

		if(isset($_POST['action_login']) && $_POST['action_login']=='Войти')
		{
			session_start();			
			if(isset($_POST['login']) && $_POST['login'] != '' && isset($_POST['password']) && $_POST['password'] != '')
			{
				$login = htmlspecialchars($_POST['login']);
				$password = md5(md5(htmlspecialchars($_POST['password']).'mkfg').'mkfg');				
				try
				{
					$sql='SELECT COUNT(*), id FROM admin WHERE login=:login AND password=:password';
					$s=$this->pdo->prepare($sql);
					$s->bindValue(':login', $login);
					$s->bindValue(':password', $password);
					$s->execute();
				}
				catch(PDOException $e){out('Не удалось проверить логин и пароль');}
				$row=$s->fetch();
				if($row[0]>0)
				{

					$id=$row['id'];
					$key=randString();
					$keyHash=md5(md5($key.'mkfg').'mkfg');

					try
					{
						$sql='UPDATE admin SET prikey=:prikey WHERE id=:id';
						$s=$this->pdo->prepare($sql);
						$s->bindValue(':prikey', $keyHash);
						$s->bindValue(':id',$id);
						$s->execute();
					}
					catch(PDOException $e){out('Запись данных не удалась');}					
					$_SESSION['id']=$id;
					$_SESSION['key']=$key;					
					$access=true;				
				}
			}
		}
		return $access;
	}	

	/***************/

	public function exitLogin()
	{
		session_start();
		unset($_SESSION['id']);
		unset($_SESSION['key']);
	}
}