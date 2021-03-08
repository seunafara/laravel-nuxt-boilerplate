<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <nuxt-link class="navbar-brand" to="/">Laravel-Nuxt</nuxt-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <nuxt-link
              class="nav-link active"
              aria-current="page"
              to="/dashboard"
              v-if="authenticated"
              >Dashboard</nuxt-link
            >
          </li>
          <li v-if="!authenticated" class="nav-item">
            <nuxt-link
              class="nav-link active"
              aria-current="page"
              to="/auth/login"
              >Login</nuxt-link
            >
          </li>
          <li v-if="!authenticated" class="nav-item">
            <nuxt-link
              class="nav-link active"
              aria-current="page"
              to="/auth/register"
              >Register</nuxt-link
            >
          </li>

          <button type="button" v-if="authenticated" @click.prevent="signOut">
            Signout
          </button>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    async signOut() {
      try {
        await this.$auth.logout();
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>

<style></style>
