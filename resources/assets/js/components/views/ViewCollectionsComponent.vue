<template>
	<div class="typical-body">

		<div class="title">
			<i class="fa fa-bolt"></i>
			<span>Browse Collections</span>
		</div>

		<div class="panel">
			<div class="heading bottom-line" style="margin-bottom:21px;">Total - <b>{{$store.getters.getCollections.length}}</b>
				{{$store.getters.getCollections.length==1?'Collection':'Collections'}}
			</div>
			<router-link to="/collections/create"><button class="button green" style="padding:10px 17px;margin-bottom:20px;">New</button></router-link>
			<table cellpadding=0 cellspacing=0>
				<thead>
					<th style="width:16.666666%">Collection name</th>
					<th style="width:16.666666%">Active Records</th>
					<th style="width:16.666666%">Created at</th>
					<th style="width:16.666666%">Last Updated</th>
				</thead>

				<tbody>
					<tr v-for="collection in collections">
						<td><span class="clickable" @click="viewCollection(collection.id)">{{ collection.name }}</span></td>
						<td>{{ collection.active_records }}</td>
						<td>{{ collection.created_at }}</td>
						<td>{{ collection.updated_at }}</td>
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

			}
		},
		methods: {
			viewCollection(id){
				if(this.collections.find(c=>c.id == id) && this.collections.find(c=>c.id == id).CAN_VIEW == "1")
					this.$router.push('/collections/view/' + id.toLowerCase());
				else 
					swal("No access.", "You don't have permission to view this collection. Please see your administrator.", "error");
			}
		},
		computed: {
			collections(){
				return this.$store.getters.getCollections;
			}
		}
	}
</script>

<style lang="scss" scoped>
	table{
		tbody{
			tr{
				height:30px;
			}
		}
	}
</style>
