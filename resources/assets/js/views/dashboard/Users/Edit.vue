<template>
	<section>
		<section class="content-header">
      <h1>
        Create User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Create User</li>
      </ol>
    </section>
    <section class="content">
    	<div class="box box-danger">
            <div class="box-body">
                <form class="form-horizontal" @submit.prevent="save">
                         <div class="form-group">
                                         <div class="col-md-6">
                                                        <input type="text" 
                                                        v-model="first" 
                                                        class="form-control"
                                                       
                                                        placeholder="First Name">
                                          </div>
                                          <div class="col-md-6">
                                                    <input type="text" 
                                                    v-model="last" 
                                                    class="form-control" 
                                                    
                                                    placeholder="Last Name">
                                          </div>
                             </div>
                             <div class="form-group">
                                               <div class="col-md-6">
                                                    <input type="text" 
                                                    v-model="user.username" 
                                                    disabled="disabled" 
                                                    class="form-control">
                                                </div>
                                                 <div class="col-md-6">
                                                                <input type="text" 
                                                                v-model="user.email"
                                                                disabled="disabled" 
                                                                class="form-control" 
                                                                placeholder="Email">
                                                    </div>
                                     </div>
                                      <div class="form-group">
                                                       <div class="col-md-6">
                                                                  <label>Admin Option</label>
                                                                   <div class="radio">
                                                                   <label>
                                                                     <input type="radio" value="0" v-model="user.is_admin">  
                                                                     User</label>
                                                                   </div>
                                                                   <div class="radio">
                                                                   <label>
                                                                     <input type="radio" value="1" v-model="user.is_admin">  
                                                                     Adminstrator</label>
                                                                   </div>
                                                              
                                                        </div>
                                                        <div class="col-md-6">
                                                                <label>Choose Role for User</label>
                                                                  <div class="radio">
                                                                  <label>
                                                                      <input type="radio" value="0" v-model="user.roles">
                                                                      User</label>
                                                                  </div>            
                                                            
                                                             
                                                                  <div class="radio">
                                                                  <label>
                                                                      <input type="radio" value="1" v-model="user.roles">
                                                                      Author</label>
                                                                  </div>            
                                                            
                                                                  <div class="radio">
                                                                  <label>
                                                                      <input type="radio" value="2" v-model="user.roles">
                                                                      Editor</label>
                                                                  </div>           
                                                              
                                                                  <div class="radio">
                                                                   <label>
                                                                      <input type="radio" value="3" v-model="user.roles">
                                                                     Super User</label>
                                                                  </div> 
                                                                          
                                                               
                                                        </div>
                                      </div>
                                     <div class="form-group">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-primary" @click="updateUser"><b v-if="load">Save</b><i v-else class="fa fa-refresh fa-spin"></i></button>
                                                    </div>
                                    </div>
                </form>
            </div>
        </div>
    </section>
	</section>
</template>
<script>
	import CreateMix from './CreateMix.vue'
	export default {
		   data(){
        return{
          load: true,
          source: '/api/users',
          first: '',
          last: '',
          user: []
        }
       },
       /*computed: {
           fullname: {
                 get() {
                   return this.first + ' ' + this.last = this.user.name
                 },
                 set(value){
                  var name = value.split(' ')
                  this.first = name[0]
                  this.last = name[lenght.name - 1]
                 }
           }
       },*/
       mounted(){
        axios.get(this.source + '/' + this.$route.params.id + '/edit').then(response => {
          this.user = response.data
        })
       },
       methods: {
        updateUser(){
          var vm = this
          axios.put(this.source + '/' + this.$route.params.id, this.user)
          .then(response => {

          })
        }
       }
	}
</script>