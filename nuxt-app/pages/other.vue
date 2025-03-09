<template>
  <div class="container">
    <h1>{{ title }}</h1>
    <p>{{ description }}</p>
    <NuxtLink to="/">topへ</NuxtLink>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: "Other page",
      description: "this is a message",
    };
  },
};
</script>

<style>
.container {
  padding: 30px;
}
</style>
