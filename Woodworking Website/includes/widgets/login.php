				<div class="widget">
	<h2>Login/Register</h2>
	<div class="inner">
					<form action="login.php" method="post" >
			<ul id="login">
				<li>
					Email: <br>
					<input type="text" name="email" onBlur="javascript:if(this.value==''){this.value=this.defaultValue;}" onFocus="javascript:if(this.value==this.defaultValue){this.value='';}"> 
				</li>
				<li>
					Password: <br>
					<input type="password" name="psword" />
				</li>
				<li>
					<input type="submit" name="Log in" />
				</li>
				<li>
					<a href="register.php">Register</a>
				</li>
			</ul>
		</form>
	</div>
</div>