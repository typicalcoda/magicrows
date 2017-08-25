<template>
	
	<div class="entry" :class="{'unread' : isNew }">
		<div class="time">{{time}}</div>
		<i v-if="icon" :class="icon" class="icon"></i>
		<img v-else-if="img" class="icon" :src="img" alt="">

		<div class="title">
			{{title}}
		</div>

		<div class="body">
			{{body}}
		</div>
	</div>
</template>

<script>
	export default { 
		props: ['title', 'body', 'icon', 'time', 'img', 'isNew']

	}
</script>

<style lang="scss" scoped>
	.entry:not(:last-of-type){
		border-bottom:1px solid #3a3a3a;
	}
	.entry{
		height:80px; position:relative; background: #3e3e3e;
		&.unread{
			background:#333333
		}
		.icon{
			background: #3d9244;
			border-radius: 50%;
			width: 60px;
			height: 60px;
			text-align: center;
			margin:9px 11px;
			font-size: 24px;
			color: #f5f5f5;
			float: left;
			line-height: 2.5em;
		}
		.title{
			line-height: 2;
			padding-top: 5px;
			font-size: 14px;
		}
		.body{
			font-size: 12px;
			line-height: normal;
			margin-top: 2px;
		}
		.time{
			float: right;
			line-height: 1;
			font-size: 11px;
			padding: 7px;
			opacity: .3;
		}
	}
</style>
