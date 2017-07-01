<template>
	<section>
		<section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
    <section class="content">
    	<div class="box box-danger">
    		<div class="box-body">
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<th v-for="top in thead">{{top.title}}</th>
    					</tr>
    				</thead>
    				<tbody>
    					<user-viewer v-for="user in model.data" 
                        :url='url' @delete-user="delUser" 
                        @add-user="fetchData"
                        @activate-user="fetchData"
                        @deactivate-user="fetchData"
                        v-bind:user="user"></user-viewer>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </section>
	</section>
</template>
<script>
import UserViewer from './UserViewer.vue'
	export default {
		name: 'Users',
		components: { UserViewer },
		data(){
			return{
                url: window.url,
				model:[],
				source: '/api/users/',
				thead: [
				{title: 'ID'},
				{title: 'Avatar'},
				{title: 'Name'},
				{title: 'Email'},
                {title: 'Status'},
				{title: 'Created_at'},
				{title: 'Action'}
				],
				params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
                }
			}
		},
		mounted(){
			this.fetchData()
		},
		methods: {
			fetchData(){
				var vm = this
				axios.get(this.buildURL()).then(response => {
				Vue.set(vm.$data, 'model', response.data.model)
			})
		   },
			buildURL() {
                var p = this.params
                return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            },
            delUser(user){
                var vm = this
                axios.delete(this.source + user.id).then(response => {
                    if(response.data.deleted) {

                        let index = vm.model.data.indexOf(user)
                        vm.model.data.splice(index, 1)
                    }
                })
            }
        }
	}
</script>