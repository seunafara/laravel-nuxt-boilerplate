<template>
  <div class="container">
    <div class="col-md-6 offset-md-3">
      <div class="card mt-4">
        <div class="card-header">
          <p class="mb-0">Login</p>
        </div>
        <div class="card-body">
          <form @submit.prevent="login">
            <div class="form-group">
              <label>Email</label>
              <input
                v-model="form.email"
                type="text"
                class="form-control"
                placeholder="Email"
              />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                v-model="form.password"
                class="form-control"
                placeholder="Password"
              />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default w-100">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "guest",
  data() {
    return {
      form: {
        email: "obavigo@gmail.com",
        password: "12345678"
      }
    };
  },
  methods: {
    async login() {
      try {
        await this.$auth.login({ data: this.form });
        this.$router.push(
          this.$route.query.redirect ? this.$route.query.redirect : "/"
        );
      } catch (error) {
        console.log("error");
        return;
      }
    }
  }
};
</script>

<style></style>
