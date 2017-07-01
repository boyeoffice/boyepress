<template>
	<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                   <form class="form-horizontal" @submit.prevent="updateProfile">
                   <div class="col-md-12">
                       <div class="form-group">
                       <label>Fullname</label>
                           <input type="text" v-model="user.name" class="form-control">
                       </div>
                       <div class="form-group">
                       <label>Username</label>
                           <input type="text" v-model="user.username" class="form-control">
                       </div>
                       <div class="form-group">
                       <label>Email</label>
                           <input type="text" v-model="user.email" class="form-control">
                       </div>
                       <div class="form-group">
                       	<button class="btn btn-primary"><b v-if="load">Save</b><i v-else class="fa fa-refresh fa-spin"></i></button>
                       </div>
                       </div>
                   </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        	<form @submit.prevent="updateAvatar">
        		<div class="form-group">
        		<div v-if="imgLoad" class="shot-preview"></div>
        		   <img :src="form.image" class="img img-responsive" width="200">
        		</div>
        		<div class="form-group">
        		<input type="file" v-on:change="onFileChange">
        		</div>
        		<button class="btn btn-primary">Update</button>
        	</form>
        </div>
    </div>
</div>
</template>
<script>
	export default{
		data(){
			return{
				imgLoad: false,
				user: [],
				form: {
					image: []
				},
				source: '/api/user',
				load: true,
				url: window.url
			}
		},
		mounted(){
			this.fetchData()
		},
		methods: {
			fetchData(){
				axios.get(this.source).then(response => {
					this.user = response.data
				})
			},
			updateProfile(){
				this.load = false
                axios.patch('/api/users/' + this.user.id, this.user)
                .then(response => {
                	toastr.success('Profile Updated')
                	this.load = true
                })
			},
			onFileChange(e){
                this.imgLoad = true
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
          },
          createImage(file){
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
              vm.form.image = e.target.result;
            }
            reader.readAsDataURL(file)
          },
          updateAvatar(){
          	axios.patch('/api/user/' + this.user.id, this.form.image)
               .then(response => {
               	this.imgLoad = false
               	console.log(response)
               }) 
          }
		}
	}
</script>