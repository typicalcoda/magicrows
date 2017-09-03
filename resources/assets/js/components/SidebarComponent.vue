<template>
	<div class="sidebar">
		<div class="logo">
			<img src="/img/yea.png" alt="">
		</div>

		<ul>
			<li><router-link to="/"><i class="fa fa-home fa-fw"></i>Dashboard</router-link></li>
			<li><router-link to="/users"><i class="fa fa-users fa-fw"></i>Manager Users</router-link></li>
			<li><router-link to="/ideas"><i class="fa fa-bolt fa-fw"></i>Ideas</router-link></li>
			<li><router-link to="/alerts"><i class="fa fa-bell fa-fw"></i>Notification Center</router-link></li>
			<li><router-link to="/messages"><i class="fa fa-envelope fa-fw"></i>Messages</router-link></li>
			<li><router-link to="/plugins"><i class="fa fa-plug fa-fw"></i>Browse plugins</router-link></li>
			<li><router-link to="/support"><i class="fa fa-support fa-fw"></i>Help & Support</router-link></li>
			<li><router-link to="/settings"><i class="fa fa-gear fa-fw"></i>Settings</router-link></li>
			<li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
		</ul>
	</div>
</template>

<script>
</script>

<style lang="scss" scoped>
	.sidebar{
		width: 260px;
		height: 100vh;
		position:fixed;
		background: #272727;
		.logo{
			font-size: 10px;
			width: 100%;
			background: #232323;
			height: 100px;
			position:relative;
			img{
				width: 100%;
				padding: 0 46px;
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
			}
		}
		ul{
			padding:0;
			margin:0;
			li{
				padding: 14px 18px;
				font-size: 15px;
				border-bottom: 1px solid #232323;
				color: #909090;
				transition:.4s;
				cursor: pointer;
				position: relative;
				&:hover{
					background: darken(#232323, 1%);
				}
				i{
					padding-right: 25px;
					cursor:pointer;
				}
				a{
					text-decoration: none;
					color:inherit;
					text-decoration: none;
					color: inherit;
					position: absolute;
					top: 0;
					left: 0;
					bottom: 0;
					right: 0;
					padding: 15px;
				}
			}
		}
	}
</style>
