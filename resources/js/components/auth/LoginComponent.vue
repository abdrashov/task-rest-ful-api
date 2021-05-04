<template>
	<div class="flex flex-wrap w-full justify-center items-center pt-5">
		<div class="flex flex-wrap max-w-xl">
			<div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Login</h1></div>
			<div class="p-2 w-full">
				<p v-if="message.status" class="w-full text-green-500">
					{{ message.success }}
				</p>
				<ul v-else>
					<li v-for="error in errors" class="w-full text-red-500">
						{{ error[0] }}
					</li>
				</ul>
			</div>
			<div class="p-2 w-full">
				<label class="w-full" for="name">Name</label>
				<input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Name" type="text" v-model="form.name" >
			</div>
			<div class="p-2 w-full">
				<label for="password">Password</label>
				<input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" v-model="form.password" name="password">
			</div>
			<div class="p-2 w-full mt-4">
				<button v-if="loading" @click.prevent="saveForm" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Войти</button>
				<button v-else type="submit" class="flex text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">Войти</button>
			</div>
		</div> 
	</div>
</template>

<script>
	export default {
		data(){
			return{
				form:{
					name: '',
					password:'',
				},
				errors: [],
				message: [],
				loading: true,
			}
		},
		methods:{
			saveForm(){
				this.loading = false;
				axios.post('/api/login', this.form).then((response) => {
					this.errors = [];
					this.message = response.data;
				}).catch((error) => {
					this.message = [];
					this.errors = error.response.data.errors;
				})
				this.loading = true;
			}
		}
	}
</script>