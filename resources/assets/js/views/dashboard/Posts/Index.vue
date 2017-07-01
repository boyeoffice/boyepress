<template>
	<section>
		<section class="content-header">
      <h1>
        Post
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Post</li>
      </ol>
    </section>
    <div class="box box-danger">
      <div class="box-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th v-for="th in theads">{{th.label}}</th>
            </tr>
          </thead>
          <tbody>
            <post-viewer v-for="post in model.data" 
              @delete-post="delPost"
             :post="post"></post-viewer>
          </tbody>
        </table>
      </div>
    </div>
	</section>
</template>
<script>
import PostViewer from './PostViewer.vue'
  export default {
    components: { PostViewer },
    data(){
      return{
        model: [],
        source: '/api/post/',
        theads: [
        {label: 'ID'},
        {label: 'title'},
        {label: 'Category'},
        {label: 'Status'},
        {label: 'Created By'},
        {label: 'Date'},
        {label: 'Action'}
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
            delPost(post){
              var vm = this
              axios.delete(this.source + post.id)
              .then(response => {
                let index = this.model.data.indexOf(post)
                vm.model.data.splice(index, 1)
                toastr.success('You have deleted the post')
              })
            }
    }
  }
</script>

