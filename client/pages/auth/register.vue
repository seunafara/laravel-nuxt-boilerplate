<template>
  <div class="container">
    <div class="col-md-6 offset-md-3">
      <div class="card mt-4">
        <div class="card-header">
          <p class="mb-0">Register</p>
        </div>
        <div class="card-body">
          <form @submit.prevent="register">
            <div class="form-group">
              <label>Name</label>
              <input
                v-model="form.name"
                type="text"
                class="form-control"
                placeholder="Name"
              />
            </div>
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
                Register
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
        name: "oba",
        email: "obavigo@gmail.com",
        password: "12345678"
      }
    };
  },
  methods: {
    async register() {
      try {
        await this.$axios.post("/auth/register", this.form);
      } catch (error) {
        console.log("error");
        return;
      }

      this.$auth.login({ data: this.form });

      this.$router.push({ name: "index" });
    }
  }
};
</script>

<style></style>
