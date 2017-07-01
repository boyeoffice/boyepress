<template>
	<tr>
		<td>{{ user.id }}</td>
		<td><img v-bind:src="url + '/' + user.avatar" class="img img-circle" width="25"></td>
		<td>{{ user.name }}</td>
		<td>{{ user.email }}</td>
		<td v-if="user.status === 1"><i class="fa fa-circle text-success"></i></td>
		<td v-else><i class="fa fa-circle text-muted"></i></td>
		<td>{{ user.created_at}}</td>
		<td>
		<button class="btn btn btn-info btn-sm" @click="backendUser(user,backUser)" v-if="user.is_admin === 0" title="lock to backend user"><i class="fa fa-lock"></i></button>
		<router-link v-bind:to="'users/' + user.id" class="btn btn btn-info btn-sm" title="view user"><i class="ion ion-eye"></i></router-link>
		<router-link v-bind:to="'users/' + user.id + '/edit'" class="btn btn btn-primary btn-sm" title="edit user"><i class="ion ion-edit"></i></router-link>
		<button class="btn btn-warning" @click="deactivateUser(user,decStatus)" v-if="user.status === 1" title="deactive user"><i class="ion ion-pause"></i></button>
		<button class="btn btn-success" @click="activateUser(user,actStatus)" v-else title="activate user"><i class="ion ion-play"></i></button>
		<button class="btn btn btn-danger btn-sm" title="delete user" @click="$emit('delete-user', user)">
		<i class="ion ion-trash-b"></i></button>
		</td>
	</tr>
</template>
<script>
	export default{
		props: ['user', 'url'],
		data(){
			return{
				actStatus: {
					status: '1'
				},
				decStatus:{
					status: '0'
				},
				backUser: {
					is_admin: '1'
				}
			}
		},
		methods: {
			activateUser(oldUser, newUser){
				var vm = this
				axios.patch('/api/users/' + oldUser.id, newUser).then(response => {
					vm.$emit('activate-user')
					toastr.success('You have activated this user')
				})
			},
			deactivateUser(oldUser, newUser){
				var vm = this
				axios.patch('/api/users/' + oldUser.id, newUser).then(response => {
					vm.$emit('deactivate-user')
					toastr.success('You have deactivated this user')
				})
			},
			backendUser(oldUser, newUser){
				var vm = this
				axios.patch('/api/users/' + oldUser.id, newUser)
				.then(response => {
					vm.$emit('add-user')
					toastr.success('You have added user to backend')
				})
			}
		}
	}
</script>