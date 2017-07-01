<template>
	<tr>
		<td><input type="text" v-if="edit"  class="form-control" v-model="editForm.title">
		<div v-else>{{ cat.title }}</div>
		</td>
         <td><textarea class="form-control" v-if="edit" v-model="editForm.description"></textarea>
         <div v-else>{{ cat.description }}</div>
         </td>
         <td><button @click="editCat" v-if="!edit" class="btn btn-info"><i class="ion ion-edit"></i></button>
         <button class="btn btn-primary" v-if="edit" @click="updateCat(cat, editForm)"><i class="fa fa-save"></i> </button>
         <button class="btn btn-default" @click="cancelEdit" v-if="edit"><i class="ion ion-close"></i> </button>
          <button class="btn btn-danger" v-if="!edit"
         	@click="$emit('delete-cat', cat)">
          <i class="ion ion-trash-b"></i>
         </button> </td>
	</tr>
</template>
<script>
	export default {
		props: ['cat'],
		data() {
			return {
				edit: false,
				editForm: {
					title: '',
					description: ''
				}
			}
		},
		methods: {
			editCat(){
				this.edit = true,
				this.editForm.title = this.cat.title,
				this.editForm.description = this.cat.description
			},
			cancelEdit(){
				this.edit = false,
				this.editForm.title = '',
				this.editForm.description = ''
			},
			updateCat(oldCat, newCat){
				axios.patch('/api/cat/' + oldCat.id, newCat).then(response => {
					this.$emit('update-cat')
					this.cancelEdit()
					toastr.success('You have updated this category')
				})
			}
		}
	}
</script>