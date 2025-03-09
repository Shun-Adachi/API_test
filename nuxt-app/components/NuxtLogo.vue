<template>
  <div class="nuxt-logo">
    <img src="https://v2.nuxt.com/logos/nuxt.svg" alt="Nuxt Logo" />
  </div>
</template>

<script>
export default {
  name: "NuxtLogo",
};
</script>

<style scoped>
.nuxt-logo {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.nuxt-logo img {
  max-width: 200px;
  height: auto;
}
</style>
