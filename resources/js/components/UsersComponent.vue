<template>
	<div>
		Fuck
		<ul>
			<li v-for="user in users">
				{{ user.name }}
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		data: function () {
			return {
				users: [],
				loading: true
			}
		},
		mounted() {
			this.loadComponents();
		},
		methods: {
			loadComponents: function () {
				axios.get('/api/users')
				.then((response) => {
					this.users = response.data.data;
					this.loading = false;
				})
				.catch(function (error) {
					console.log(error);
				});
			},
		}
	}
</script>