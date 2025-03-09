<template>
  <div class="container">
    <p>パラメータ：{{ this.$route.params.id }}</p>
    <NuxtLink to="/">topへ</NuxtLink>
  </div>
</template>

<style>
.container {
  padding: 30px;
}
</style>
