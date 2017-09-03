<template>
	<div class="typical-body">

		<div class="title">
			<i class="fa fa-bolt"></i>
			<span>{{isCreating ? 'Create a new' : 'Editing' }} Idea</span>
		</div>

		<div class="panel">
			<div class="heading bottom-line">
				<span v-if="isCreating">Create a new Idea</span>
				<span v-else>Editing <b>{{idea.name}}</b></span>
				<i class="fa fa-trash pull-right"></i>
			</div>
			<div class="div container-fluid none">
				<div class="col-md-6">
					<div class="row line-space">
						<div class="input">
							<label>Idea name*</label>
							<input type="text" v-model="idea.name">
						</div>
					</div>
					<div class="row line-space">
						<div class="input">
							<label>Idea description</label>
							<textarea v-model="idea.description"></textarea>
						</div>
					</div>
					<div class="row line-space">
						<div class="row">
							<div class="col-md-4">
								<div class="input">
									<label>Select Category</label>
									<select v-model="idea.category">

									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="input">
									<label>Access Level</label>
									<select v-model="idea.accessLvl">
										<option value="">Level 1</option>
										<option value="">Level 2</option>
										<option value="">Level 3</option>
										<option value="">Level 4</option>
										<option value="">Level 5</option>
										<option value="">Level 6</option>
										<option value="">Level 7</option>
										<option value="">Level 8</option>
										<option value="">Level 9</option>
										<option value="">Level 10</option>
										<option value="">With Auth</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="input">
									<label>Max # of Records</label>
									<input type="text" v-model="idea.maxRecords">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="heading">Idea fields</div>
					</div>
					<div class="row">
						<div class="col-md-11">
							<div class="row line-space">
								<div class="row">
									<div class="col-md-6">
										<div class="input">
											<label for="">Field name</label>
											<input type="text" v-model="field.name">
										</div>
									</div>

									<div class="col-md-6">
										<div class="input">
											<label for="">Type</label>
											<select name="" id="" v-model="field.type">
												<option value="text">Text</option>
												<option value="Number">Number</option>
												<option value="Email">Email</option>
												<option value="Random ID">Random ID</option>
												<option value="Counter">Counter</option>
												<option value="Image">Image</option>
												<option value="File">File</option>
												<option value="Date/Time">Date/Time</option>
												<option value="Yes/No">Yes/No</option>
												<option value="Options">Options</option>
											</select>
											<div v-if="isOptionType">
												<button>
													<i class="fa fa-plus"></i>
												</button>
												<input type="text" style="width: 80%;float: right;" placeholder="add an item">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row line-space">
								<div class="row">
									<div class="col-md-3">
										<div class="input">
											<label for="">Prefix</label>
											<input type="text" v-model="field.prefix">
										</div>
									</div>

									<div class="col-md-3">
										<div class="input">
											<label for="">Suffix</label>
											<input type="text" v-model="field.suffix">
										</div>
									</div>

									<div class="col-md-3">
										<div class="input">
											<label for="">Max Length</label>
											<input type="text" v-model="field.maxLength">
										</div>
									</div>

									<div class="col-md-3">
										<div class="input">
											<label for="">Min Length</label>
											<input type="text" v-model="field.minLength">
										</div>
									</div>
								</div>
							</div>
							<div class="row line-space">
								<div class="row">
									<div class="col-md-6">
										<div class="input">
											<label for="">Required?</label>
											<select v-model="field.required">
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input">
											<label for="">Default Value</label>
											<input type="text" v-model="field.defaultValue">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="btn-opts">
								<i class="fa fa-check default" @click="submitField"></i>
								<i v-if="editingField" class="fa fa-times default" @click="cancelFieldEdit"></i>
								<i v-if="editingField" class="fa fa-trash red"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					Fields Summary
					<table cellpadding=0 cellspacing=0>
						<thead>
							<th style="width:25%">Field name</th>
							<th style="width:25%">Type</th>
							<th style="width:25%">Created</th>
							<th style="width:25%">Last Modified</th>
						</thead>

						<tbody>
							<tr v-for="f in idea.fields">
								<td><span class="clickable" @click="editField(f)">{{f.name}}</span></td>
								<td><span class="field-type">{{f.type}}</span></td>
								<td>--:--</td>
								<td>--:--</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<router-link to="/ideas"><button class="button">Return</button></router-link>
					<button class="button green" @click="createIdea">Create</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default { 
		data(){
			return {
				editingField : false,
				isOptionType: false,
				originalFieldName: '',
				field: {
					name: '',
					type: '',
					prefix: '',
					suffix: '',
					maxLength: '',
					minLength: '',
					unique: false,
					required: false,
					defaultValue: '',
					created_at: '',
					updated_at: '',
					deleted_at: ''
				},
				idea: {
					name: '',
					description: '',
					category: 0,
					accessLvl: 0,
					maxRecords: 0,
					created_at: '',
					updated_at: '',
					deleted_at: '',
					fields: []
				}
			}
		},
		mounted(){
			let scope = this
			if(scope.$store.getters.getIdeas.length == 0){
				axios.get('api/get/ideas/')
				.then(function(res){
					scope.$store.dispatch('saveIdeas', res.data)
				})
				.catch(function(err){
					swal("An error ocurred", "Could not fetch ideas", "error")
				})
			}

			if(!this.isCreating)
			{
				axios.get('/api/get/idea/' + this.$route.params.id)
				.then( function(res){
					console.log(res.data);
				})
				.catch( function(err){
					swal("An error occurred", "Idea details could not be fetched at this time.", "error");
				});
			}
		},
		methods: {
			submitField() {
				let f = this.field;
				if(f.name.length > 0 && f.type){
					if(!this.editingField)
					{
						if(!this.idea.fields.find(x=>x.name == f.name))
						{
							this.idea.fields.push(f); 
							this.field = {};
						}
						else 
							swal("Duplicate field detected", "A field with that name already exists, try giving it a different name.", "error")
					} else {
						let theField = this.idea.fields.find(x=>x.name == this.originalFieldName);
						for(var prop in theField){
							if(theField.hasOwnProperty(prop))
								theField[prop] = this.field[prop]
						}

						this.editingField = false;
						this.field = {};
					} 
				} else 
				swal("Empty input", "Please specify at least a name and a type the field.", "error" );
			},
			editField(f){
				this.field = _.cloneDeep(f);
				this.originalFieldName = f.name;
				this.editingField = true;
			},
			cancelFieldEdit(){
				this.field = {};
				this.editingField = false;
			},
			createIdea(){
				if(this.idea.name){
					let ideas = this.$store.getters.getIdeas;
				}				 else {
					swal("Empty fields", "Please make sure you fill in all required fields", "error");
				}
			}
		},
		watch : {
			'field.type': function(val){
				this.isOptionType = val == "Options";
			}
		},
		computed: {
			isCreating(){
				return (!this.$route.params.id)
			},
			theIdea(){
				let id = this.$route.params.id;
				console.log(this.$store.getters.getIdeas);
			}
		}
	}
</script>

<style lang="scss" scoped>
	.btn-opts{
		padding-top:24px;
	}
</style>
