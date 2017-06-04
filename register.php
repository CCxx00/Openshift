<?php
    header("content-type:text/html;charset=utf-8");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];
	

	if($password!=$password1)
	{
		echo "<script>alert('密码错误');history.back();</script>";
		exit();	
	}

    $mysql=mysqli_connect("localhost","zll","zll1212hxe","mysqldb");
	
	if(!$mysql)
		echo "<script>alert('链接失败');history.back();</script>";
	mysqli_set_charset($mysql, 'utf8');
	$sql="select * from wzny";
	$y=mysqli_query($mysql, $sql);
	if($y)
	{
		while($row = mysqli_fetch_assoc($y))
		if($row['name']==$username)
		{
			echo "<script>alert('已经注册了');history.back();</script>";
			exit();	
		}
		$register="insert into wzny(name,words) value('$username','$password')";
		$query=mysqli_query($mysql, $register);
		if($query) echo "<script>alert('注册成功!');history.back();</script>";
		else echo "<script>alert('注册失败!');history.back();</script>";
	}
?>