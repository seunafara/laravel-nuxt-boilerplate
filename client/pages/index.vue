<template>
  <div class="container">
    <div>
      <h1>Home</h1>
      <p v-if="user">{{ user.name }}</p>
    </div>
  </div>
</template>

<script>
export default {};
</script>
