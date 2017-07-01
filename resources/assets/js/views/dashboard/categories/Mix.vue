<script>
	export default {
		data(){
			return{
				cats: [],
				source: '/api/cat',
				method: 'post',
				thead:[
				{label: 'Title'},
				{label: 'description'},
				{label: 'Action'}
				],
				form: {
					title: '',
					description: ''
				}
			}
		},
		created(){
			this.fetchData()	
		},
		methods: {
			fetchData(){
				axios.get(this.source).then(response => {
				this.cats = response.data
				})
			},
			save(){
           axios[this.method](this.source, this.form).then(response => {
           	if(response.data.success){
           		toastr.success('You have created new category')
           		this.cats.push(response.data.cat)
           		this.form = {title: '', description: ''}
           	}
            })
		 },
		 deleteCat(cat){
		 	axios.delete(this.source + '/' + cat.id).then(response => {
		 		let index = this.cats.indexOf(cat)
		 		this.cats.splice(index, 1)
		 	})
		 }
	  }
	}
</script>