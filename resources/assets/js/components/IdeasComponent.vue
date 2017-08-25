<template>
	<div class="typical-body">

		<div class="title">
			<i class="fa fa-bolt"></i>
			<span>Ideas</span>
		</div>

		<div class="panel">
			<div class="heading">Create an idea</div>
			<div class="div container-fluid none">
				<div class="col-md-6">
					<div class="row line-space">
						<div class="input">
							<label>Idea name</label>
							<input type="text">
						</div>
					</div>
					<div class="row line-space">
						<div class="input">
							<label>Idea description</label>
							<textarea></textarea>
						</div>
					</div>
					<div class="row">
						<div class="heading">Add fields</div>
					</div>
					<div class="row">
						<div class="col-md-11">
							<div class="row line-space">
								<div class="row">
									<div class="col-md-6">
										<div class="input">
											<label for="">Field name</label>
											<input type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="input">
											<label for="">Type</label>
											<select name="" id="">
												<option value="text">Text</option>
												<option value="Number">Number</option>
												<option value="Email">Email</option>
												<option value="Random ID">Random ID</option>
												<option value="Counter">Counter</option>
												<option value="Image">Image</option>
												<option value="File">File</option>
												<option value="Date/Time">Date/Time</option>
												<option value="Yes/No">Yes/No</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row line-space">
								<div class="row">
									<div class="col-md-3">
										<div class="input">
											<label for="">Prefix</label>
											<input type="text">
										</div>
									</div>

									<div class="col-md-3">
										<div class="input">
											<label for="">Suffix</label>
											<input type="text">
										</div>
									</div>

									<div class="col-md-2">
										<div class="input">
											<label for="">Max Length</label>
											<input type="text">
										</div>
									</div>

									<div class="col-md-2">
										<div class="input">
											<label for="">Min Length</label>
											<input type="text">
										</div>
									</div>
									<div class="col-md-2">
										<div class="input">
											<label for="">Unique?</label>
											<select>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<div class="btn-opts" :class="!editingFields ? 'paddedTop' : ''">
								<i class="fa fa-check default"></i>
								<i v-if="editingFields" class="fa fa-times default"></i>
								<i v-if="editingFields" class="fa fa-trash red"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					Fields Summary
					<table>
						<thead>
							<th style="width:25%">Field name</th>
							<th style="width:25%">Type</th>
							<th style="width:25%">Created</th>
							<th style="width:25%">Last Modified</th>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default { 
		data(){
			return {
				editingFields : false,
				switcherStatus: false,
				field: {
					name: '',
					type: {

					},
					prefix: '',
					suffix: '',
					maxLength: 100,
					minLength: 1,
					unique: false,
					created_at: '',
					updated_at: '',
					deleted_at: ''
				},
				idea: {
					name: '',
					description: '',
					accessLvl: 1,
					isAuthd: false,
					maxRecords: 0,
					created_at: '',
					updated_at: '',
					deleted_at: '',
					fields: []
				}
			}
		},
		mounted(){
			swal("sss");
		}
	}
</script>

<style lang="scss" scoped>
	.panel{
		-webkit-box-shadow: 0px 0px 34px -9px rgba(0,0,0,0.22);
		-moz-box-shadow: 0px 0px 34px -9px rgba(0,0,0,0.22);
		box-shadow: 0px 0px 34px -9px rgba(0,0,0,0.22);
		margin:0 15px;
		padding:20px;
		color: #828282;
		font-size: 12px;
		background:#fff;
		.heading{
			font-family: 'Ubuntu', sans-serif;
			font-size: 14px;
			border-bottom: 1px solid #f7f7f7;
			padding-bottom: 15px;
			margin-bottom: 30px;
		}
		.btn-opts{
			padding-top:24px;
			&.paddedTop{
				padding-top:56px;
			}
		}
	}
</style>
