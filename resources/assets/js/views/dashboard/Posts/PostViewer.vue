<template>
	<tr>
		<td>{{post.id}}</td>
		<td>{{post.title}}</td>
		<td>{{post.category_id}}</td>
		<td v-if="post.status === 1"> Active</td>
		<td v-else>Draft</td>
		<td>{{post.user_id}}</td>
		<td>{{post.created_at}}</td>
		<td>
			<router-link class="btn btn-primary" v-bind:to="'posts/' + post.id + '/edit'">
				<i class="fa fa-edit"></i>
			</router-link>
			<button class="btn btn-danger" @click="$emit('delete-post', post)"><i class="ion ion-trash-b"></i></button>
		</td>
	</tr>
</template>
<script>
	export default{
		name: 'PostViewer',
		props: ['post']
	}
</script>