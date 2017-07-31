<template>
	<div class="bar">
		<div class="container">
			<div class="col-md-10">
				<div class="title">
					<img src="/img/logo.png" alt="">
					<span>
						KRANJO
					</span>
				</div>
			</div>
			
			<div class="col-md-20">
				<ul class="left">
					<li><div class="menu-item"><i class="fa fa-envelope" aria-hidden="true"></i></div>
						<div class="dropdown">
							<div class="container-fluid">
								<div class="row upper">
									<div class="col-md-15 left"><i class="fa fa-edit"> </i>New Message</div>
									<div class="col-md-15 right"><i class="fa fa-envelope-square"></i>View Messages</div>
								</div>

								<div class="row content">
									<div class="message">
										<div class="sender-img"><img class="img-circle" src="https://image.prntscr.com/image/niTrUwoJTH_ZZkRQYpH8_w.png" alt=""></div>
										<span class="sender">Mokorina Chocolina</span>
										<span class="timestamp">Everyday</span>
										<p class="message-body">brdan i lohohohoohhooooove you...</p>
									</div>

									<div class="message">
										<div class="sender-img"><img class="img-circle" src="http://stanlemmens.nl/wp/wp-content/uploads/2014/07/bill-gates-wealthiest-person.jpg" alt=""></div>
										<span class="sender">Bill Gates</span>
										<span class="timestamp">14/06</span>
										<p class="message-body">Tbh sometimes I feel like committing suic...</p>
									</div>

									<div class="message">
										<div class="sender-img"><img class="img-circle" src="https://pbs.twimg.com/profile_images/831993825635745796/HnVmB0-k.jpg" alt=""></div>
										<span class="sender">Avatar</span>
										<span class="timestamp">Tuesday</span>
										<p class="message-body">izi wudhu :3</p>
									</div>
								</div>	
							</div>
						</div>
					</li><!--
					--><li><div class="menu-item"><i class="fa fa-comments-o" aria-hidden="true"></i></div></li><!--
				--><li><div class="menu-item"><i class="fa fa-calendar" aria-hidden="true"></i></div></li><!--
			--><li class="user"><div class="menu-item"><span>My Account</span><i class="fa fa-caret-down" aria-hidden="true"></i></div></li>
		</ul>
	</div>
</div>
</div>
</template>

<script>
	export default {
		mounted() {
		},
		methods: {
		}
	}
</script>


<style lang="scss" scoped>
	.bar{
		.dropdown{
			.upper{
				background:#272727;
				padding:0 5px;
				i{
					padding-right:5px;
				}
			}
			.content{
				padding:0 5px;
				.message{
					// border: 1px solid #717171;
					border-bottom:1px solid #3e3e3e;
					margin: 5px 0;
					padding: 5px 9px;
					height: 60px;
					position:relative;
					.sender-img{
						width:50px;
						float:left;
						img{
							width:50px;
							height:50px;
						}
					}
					.sender{
						position: absolute;
						top: 0;
						line-height: 2em;
						left: 65px;
					}
					.timestamp{
						position: absolute;
						line-height: 2em;
						right: 10px;
						top: 0;
					}
					.message-body{
						height: 100%;
						line-height: 2em;
						margin: 0;
						padding-top: 20px;
						padding-left: 56px;
						color: rgba(187, 187, 187, 0.51);
						font-style: italic;
					}
				}
			}
			background:#333333;
			position:absolute;
			height:100%;
			width: 350px;
			font-size: 11px;
			height: auto;
			ul{
				padding:0;margin:0;
				li{

				}
			}
		}
		position:absolute;
		left:0;
		top:0;
		width:100%;
		height:40px;
		background:black;
		.title{
			height:100%;
			img{
				width:22px;
				padding-top:6px;
			}
			span{
				padding: 0;
				margin: 0;
				position: relative;
				top: -5px;
				padding-left: 12px;
				color: #fff;
				font-family: roboto light;
				font-size: 15px;
			}
		}
		ul.left{
			float:right;
			color:#fff;
			padding:0;
			margin:0;
			height:100%;
			li{
				line-height: 2.3em;	
				position:relative;
				display:inline-block;
				height:100%;
				transition:.4s;
				a{
					cursor:pointer;
				}
				&:hover{
					background:#252525;
				}
				.menu-item{
					padding: 0 20px;
					height:100%;
				}
				&.user{
					span{
						font-size:13px;
					}
					i{
						padding-left:6px;
						font-size:10px;
					}
				}
			}
		}
	}

	#app.dark{
		.bar{
			background:#333333;
		}
	}
</style>