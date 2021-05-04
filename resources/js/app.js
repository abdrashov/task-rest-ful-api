require("./bootstrap");

import { createApp } from "vue";
import UsersComponent from "./components/UsersComponent.vue";
import RegisterComponent from "./components/auth/RegisterComponent.vue";
import LoginComponent from "./components/auth/LoginComponent.vue";

const app = createApp({
	components: {
		UsersComponent,
		RegisterComponent,
		LoginComponent,
	}
});

app.mount("#app");