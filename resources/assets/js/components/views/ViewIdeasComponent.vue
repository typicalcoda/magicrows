<template>
	<div class="typical-body">

		<div class="title">
			<i class="fa fa-bolt"></i>
			<span>Browse Ideas</span>
		</div>

		<div class="panel">
			<div class="heading bottom-line" style="margin-bottom:21px;">Total - <b>{{$store.getters.getIdeas.length}}</b>
				{{$store.getters.getIdeas.length==1?'Idea':'Ideas'}}
			</div>
			<router-link to="/ideas/create"><button class="button green" style="padding:10px 17px;margin-bottom:20px;">New</button></router-link>
			<table cellpadding=0 cellspacing=0>
				<thead>
					<th style="width:16.666666%">Idea name</th>
					<th style="width:16.666666%">Category</th>
					<th style="width:16.666666%">Access Level</th>
					<th style="width:16.666666%">Created at</th>
					<th style="width:16.666666%">Updated at</th>
				</thead>

				<tbody>
					<tr v-for="idea in ideas">
						<td><span class="clickable" @click="viewIdea(idea.id)">{{idea.name}}</span></td>
						<td>[{{idea.category}}]</td>
						<td>{{idea.access_lvl}}</td>
						<td>{{idea.created_at}} by <span class="clickable">{{idea.user}}</span></td>
						<td>{{idea.updated_at ? idea.updated_at : 'No updates.' }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	export default { 
		data(){
			return {
				ideas: []
			}
		},
		mounted(){
			let scope = this
			console.log("Getting ideas")
			axios.get('api/get/ideas-brief')
			.then(function(res){
				scope.$store.dispatch('saveIdeas', res.data)
				scope.ideas = scope.$store.getters.getIdeas;
				console.log(scope.ideas);
			})
			.catch(function(err){
				swal("An error ocurred", "Could not fetch ideas", "error")
			})
		},
		methods: {
			viewIdea(id){
				this.$router.push('/ideas/view/' + id.toLowerCase());
			}
		}
	}
</script>

<style lang="scss" scoped>

</style>
