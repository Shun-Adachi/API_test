<template>
  <div class="register">
    <h1>ユーザー登録</h1>
    <form @submit.prevent="registerUser">
      <div>
        <label for="name">名前</label>
        <input type="text" id="name" v-model="name" required />
      </div>
      <div>
        <label for="email">メールアドレス</label>
        <input type="email" id="email" v-model="email" required />
      </div>
      <div>
        <label for="password">パスワード</label>
        <input type="password" id="password" v-model="password" required />
      </div>
      <button type="submit" :disabled="loading">登録</button>
      <div v-if="error" class="error">{{ error }}</div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const name = ref("");
const email = ref("");
const password = ref("");
const loading = ref(false);
const error = ref("");

const router = useRouter();

const registerUser = async () => {
  loading.value = true;
  error.value = "";

  try {
    const response = await $fetch("http://php:8000/api/auth/register", {
      method: "POST",
      body: {
        name: name.value,
        email: email.value,
        password: password.value,
      },
    });

    // 登録後に返ってくるレスポンスに access_token が含まれている前提です
    if (response.access_token) {
      localStorage.setItem("access_token", response.access_token);
      router.push("/");
    } else {
      error.value = "登録に失敗しました。";
    }
  } catch (err) {
    console.error(err);
    error.value = "エラーが発生しました。";
  } finally {
    loading.value = false;
  }
};
</script>

<style scoped>
.register {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
}
.register form > div {
  margin-bottom: 10px;
}
.error {
  color: red;
  margin-top: 10px;
}
</style>
