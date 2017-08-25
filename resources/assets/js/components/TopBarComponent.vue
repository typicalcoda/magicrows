<template>
	<div class="top">
		<i class="fa fa-bars burger"></i>
		<ul class="menu">
			<li v-click-outside="outsideNotifications" :class="{'active' : notificationsVisible}" @click="notificationsVisible = !notificationsVisible">
				<i class="fa fa-bell fa-fw"></i>
				<div v-if="notificationsVisible" class="dropdown">


					<entry title="Alert!!!" body="Wow, this actually works. :) I'm pretty pleased.." time="Yesterday" icon="fa fa-money"></entry>

					<div class="footer"><a href="#" class="more">See all notifications</a></div>
				</div>
			</li>

			<li v-click-outside="outsideMessages" :class="{'active' : messagesVisible}" @click="messagesVisible = !messagesVisible">
				<i class="fa fa-comments fa-fw"></i>
				<div v-if="messagesVisible" class="dropdown">
					<div class="header">
						<div class="left">
							<i class="fa fa-edit"></i>
							<span>New message</span>
						</div>
					</div>

					<entry title="Joao Baptista" body="Hey man, are you coming today?" time="08:39" icon="fa fa-money"></entry>
					<entry title="Joao Baptista" body="Hey man, are you coming today?" isNew="true" time="08:39" icon="fa fa-money"></entry>
					<entry title="Joao Baptista" body="Hey man, are you coming today?" time="08:39" icon="fa fa-money"></entry>

					<div class="footer"><a href="#" class="more">See all messages</a></div>
				</div>
			</li>

			<li v-click-outside="outsideProfile" :class="{'active' : profileVisible}" @click="profileVisible = !profileVisible">
				<span>My Account <i class="fa fa-caret-down"></i></span>
				<div v-if="profileVisible" class="dropdown small">
					<div class="profile">
						<ul>
							<li>Visit profile</li>
							<li>Settings</li>
							<li>Help & Support</li>
							<li>Logout</li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
</template>

<script>
	import EntryComponent from './EntryComponent'
	import ClickOutside from 'vue-click-outside'

	export default {
		components: {
			'entry' : EntryComponent
		},
		data(){
			return{
				notificationsVisible : false,
				messagesVisible : false,
				profileVisible : false,
			}
		},
		methods: {
			outsideNotifications(){
				this.notificationsVisible = false;
			},
			outsideMessages(){
				this.messagesVisible = false;
			},
			outsideProfile(){
				this.profileVisible = false;
			}
		},
		directives: {
			ClickOutside
		}
	}
</script>

<style lang="scss" scoped>
	$primary : #333;
	$secondary : #424242;
	$secondaryText : #ddd;
	.burger{
		float: left;
		line-height: 1.56em;
		font-size: 25px;
		color: #ccc;
		cursor:pointer;
	}
	.top{
		font-family: 'Ubuntu', sans-serif;
		width: calc(100% - 260px);
		height: 40px;
		float: right;
		background:$primary;
		padding:0 15px;
		.logo{
			height:100%;
			width:25px;
			height: 100px;
			background: #232323;
			img{
				width: 100%;
				padding: 0 59px;
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
			}
		}
		.menu{
			padding:0; margin:0; float:right; height:100%; line-height: 2.3em;
			&>li{
				&.active{
					background:#232323;
				}
				display:inline-block;
				height: 100%;
				padding: 0 12px;
				margin-right: -4px;
				transition:.4s;
				cursor: pointer;
				position:relative;
				&:hover{
					background:#232323;
				}
				&>span{
					font-size:14px;
					i{
						font-size:12px;
						padding-left:3px;
					}
				}
				.dropdown{
					background: $secondary;
					position: absolute;
					height: 100%;
					top: 40px;
					width: 400px;
					right: 0;
					cursor:auto;
					height:auto;
					&.small{
						width: 200px;
						.profile{
							ul{
								margin:0;padding:0;
								li{
									list-style-type: none;
									font-size: 13px;
									color: #888888;
									padding: 4px 15px;
									border-bottom: 1px solid #505050;
									cursor:pointer;
									transition:.4s;
									&:hover{
										background:darken(#424242, 5%);
									}
								}
							}
						}
					}
					.header{
						background:#232323;
						padding:0 10px;
						.left{
							font-size: 12px;
							color: #a7a7a7;
						}
					}
					.footer{
						width: 100%;
						background: #333333;
						text-align: center;
						font-size: 12px;
						color: #868686;
						.more{
							color: #7b7b7b;
							text-decoration: none;
							border-bottom: 1px solid #7b7b7b;
							padding-bottom: 2px;
						}
					}
				}

			}
		}
	}
</style>

