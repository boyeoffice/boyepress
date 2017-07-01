<script>
	import Multiselect from 'vue-multiselect'
	export default{
		components: { Multiselect },
		data(){
			return {
				first: '',
				last: '',
				redirect: '/dashboard/users',
				source: '/api/users',
				method: 'post',
				status: [
				{label: 'Activate', value: '1'},
				{label: 'Deactivate', value: '0'}
				],
				is_admin:[
				{label: 'Administrator', value: '1'},
				{label: 'User', value: '0'}
				],
				roles: [
				{label: 'Author', value: '1'},
				{label: 'Editor', value: '2'},
				{label: 'Super User', value: '3'}
				],
				form: {
					name: '',
					username: '',
					email: '',
					is_admin: '',
					roles: '',
					status: '',
					password: '',
					confirm_password: ''
				}
			}
		},
		methods: {
			save(){
				var vm = this
				axios[this.method](this.source, this.form).then(response => {
                    if(response.data.success){
                    	vm.$router.push(vm.redirect)
                        toastr.success('You create the post success!')
                    	}else{
                    	toastr.error('Please check all fields')
                    }
				})
			}
		}
	}
</script>