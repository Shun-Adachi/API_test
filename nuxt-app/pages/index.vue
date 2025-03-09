<template>
  <div class="home">
    <h1>ホームページ</h1>
    <div v-if="isLoggedIn">
      <p>ようこそ！あなたはログインしています。</p>
      <button @click="logout">ログアウト</button>
    </div>
    <div v-else>
      <NuxtLink to="/login">ログイン</NuxtLink>
      <NuxtLink to="/register">ユーザー登録</NuxtLink>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const isLoggedIn = ref(false)

onMounted(() => {
  // シンプルに localStorage の JWT の有無で判定
  const token = localStorage.getItem('access_token')
  isLoggedIn.value = !!token
})

const logout = () => {
  localStorage.removeItem('access_token')
  isLoggedIn.value = false
  router.push('/')
}
</script>

<style scoped>
.home {
  text-align: center;
  padding: 20px;
}
.home a {
  margin: 0 10px;
}
</style>
