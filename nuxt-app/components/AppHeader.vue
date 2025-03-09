<template>
  <header class="app-header">
    <h1>MySite</h1>
    <nav>
      <NuxtLink to="/">Home</NuxtLink>
      <NuxtLink to="/about">About</NuxtLink>
      <NuxtLink to="/contact">Contact</NuxtLink>
    </nav>
  </header>
</template>

<script>
export default {
  name: "AppHeader",
};
</script>

<style scoped>
.app-header {
  background: #f2f2f2;
  padding: 10px 20px;
  display: flex;
  align-items: center;
}

.app-header h1 {
  margin: 0;
  margin-right: 20px;
}

nav a {
  margin-right: 10px;
  text-decoration: none;
  color: #333;
}

nav a:hover {
  text-decoration: underline;
}
</style>
