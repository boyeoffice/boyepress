<script>
import InputTag from 'vue-input-tag'

	export default {
        components: { InputTag },
        props: {
            tagsArray: {
            type: Array,
            default() {
                return []
                    }
                },
                callbackMethod: {
                    type: Function,
                    default() {
                        return undefined
                    }
                }
            },
		data() {
			return {
				cats: [],
                redirect: '/dashboard/posts',
                method: 'post',
                imgUpload: true,
                imgLoad: false,
                imgLd: false,
                tabCat: false,
                form: {
                    title: '',
                    content: '',
                    tags: '',
                    image: '',
                    category_id: '',
                    meta_description: '',
                    status: '',
                    published_at: '',
                }
			}
		},
		created() {
			this.fetchCat()
		},
		methods: {
			fetchCat(){
				axios.get('/api/cat').then(response => {
					this.cats = response.data
				})
			},
            featuredImg(){
                this.imgUpload = false

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
            };
            reader.readAsDataURL(file);
            this.imgLoad = false
            this.imgLd = true
          },
            publish(){
                var vm = this
                this.form.tags = {tagsArray: []}
                axios[this.method]('/api/post', this.form).then(response => {
                    toastr.success('You have created new post')
                    vm.$router.push(vm.redirect)
                })
            }
		}
	}
</script>