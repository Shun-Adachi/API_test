<template>
  <form @submit.prevent="login">
    <div>
      <label for="email">Email:</label>
      <input v-model="email" type="email" id="email" required />
    </div>
    <div>
      <label for="password">Password:</label>
      <input v-model="password" type="password" id="password" required />
    </div>
    <button type="submit">ログイン</button>
  </form>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const email = ref("");
const password = ref("");
const router = useRouter();

const login = async () => {
  try {
    const response = await $fetch("http://php:8000/api/auth/login", {
      method: "POST",
      body: { email: email.value, password: password.value },
    });
    // 例：JWT を localStorage に保存
    localStorage.setItem("access_token", response.access_token);
    // ログイン成功後、必要なページへ遷移
    router.push("/");
  } catch (error) {
    console.error("ログイン失敗", error);
    alert("認証に失敗しました。");
  }
};
</script>
