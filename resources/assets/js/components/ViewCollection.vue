<template>
	<div class="typical-body">

		<div class="title">
			<i class="fa fa-bolt"></i>
			<span>Create a new Collection</span>
		</div>

		<div class="panel">
			<div class="heading bottom-line">
				<span>Create a new Collection</span>
			</div>
			<div class="div container-fluid none">
				<div class="col-md-6">
					<div class="row line-space">
						<div class="input">
							<label>Collection name*</label>
							<input type="text" v-model="collection.name">
						</div>
					</div>
					<div class="row line-space">
						<div class="input">
							<label>Collection description</label>
							<textarea v-model="collection.description"></textarea>
						</div>
					</div>
					<div class="row line-space">
						<div class="row">
							<div class="col-md-12">
								<div class="input">
									<label>Max # of Records</label>
									<input type="text" v-model="collection.maxRecords">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="heading">Collection fields</div>
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
							<tr v-for="f in collection.fields">
								<td><span class="clickable" @click="editField(f)">{{f.name}}</span></td>
								<td><span class="badge">{{f.type}}</span></td>
								<td>--:--</td>
								<td>--:--</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<router-link to="/collections"><button class="button">Return</button></router-link>
					<button class="button green" @click="createCollection">Create</button>
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
				collection: {
					description: '',
					maxRecords: 0,
					created_at: '',
					updated_at: '',
					deleted_at: '',
					fields: []
				}
			}
		},
		mounted(){
		},
		methods: {
			submitField() {
				let f = this.field;
				if(f.name.length > 0 && f.type){
					if(!this.editingField)
					{
						if(!this.collection.fields.find(x=>x.name == f.name))
						{
							this.collection.fields.push(f); 
							this.field = {};
						}
						else 
							swal("Duplicate field detected", "A field with that name already exists, try giving it a different name.", "error")
					} else {
						let theField = this.collection.fields.find(x=>x.name == this.originalFieldName);
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
			createCollection(){
				if(this.collection.name){
					let collections = this.$store.getters.getCollections;
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
	}
</script>

<style lang="scss" scoped>
	.btn-opts{
		padding-top:24px;
	}
</style>
